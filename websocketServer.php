<?php
error_reporting(E_ALL);
// 设置永不超时，允许脚本挂起等待连接
set_time_limit(0);
// 打开绝对（隐式）刷送，显示请求内容
ob_implicit_flush();

$serverFD = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// 重用地址和端口，须在socket_bind前使用。
// 未启用重用话，后台挂起server服务且有客户端连接时直接ctrl+c后
// 再次运行会出现Warning: socket_bind(): unable to bind address [48]: Address already in use等情况
// level：指定协议级别，SQL_SOCKET为socket level
socket_set_option($serverFD, SOL_SOCKET, SO_REUSEADDR, 1);
socket_set_option($serverFD, SOL_SOCKET, SO_REUSEPORT, 1);
$host = '127.0.0.1';
$port = 10002;
socket_bind($serverFD, $host, $port);
socket_listen($serverFD);
//设置非阻塞，允许多个客户端同时发送数据
socket_set_nonblock($serverFD);

// 文件描述符列表
$socketFDList[(int)$serverFD] = $serverFD;
// 昵称列表
$nickname = [];
// 握手列表
$handShake = [];
// 暂时不考虑写入和异常的监视
$write = $except = [];
while (true) {
    // socket_select只保留就绪状态的文件描述符，所以在每次调用前须重新声明要select遍历列表
    $read = $socketFDList;
    /**
     * 在指定的超时时间内在给定的套接字数组上运行 select() 系统调用，返回就绪状态的套接字数组
     * $read 数组中列出的套接字将被监视以查看字符是否可供读取
     * $write 将监视阵列中列出的套接字以查看写入是否不会阻塞。
     * $except 数组中列出的套接字将被监视异常。
     * $seconds: 超时时间，0为立即返回
     * socket_select() 返回就绪状态的套接字数，没有则返回0，超时返回false
     */
    if (socket_select($read, $write, $except, 0) > 0) {
        // 遍历可读的文件描述符集合
        foreach ($read as $readFD) {
            // 如果可读的是服务端文件描述符，则表示有新连接进来,服务端暂时只作为连接客户端使用。
            if ($readFD == $serverFD) {
                $clientFD = socket_accept($serverFD);
                echo 'client connected: ' . $clientFD . "\n";
                if ($clientFD === false) {
                    echo socket_strerror(socket_last_error($serverFD));
                    break;
                }
                $socketFDList[(int)$clientFD] = $clientFD;
            } else {
                // 首次连接需要握手
                if (!isset($handShake[(int)$readFD])) {
                    $content = socket_read($readFD, 2048);
                    if (preg_match("/Sec-WebSocket-Key:(.*)/", $content, $match)) {
                        // 移除Sec-WebSocket-Key两侧字符，否则这些字符会影响加密结果。
                        $secWebSocketKey = trim($match[1]);

                        // 计算Sec-WebSocket-Accept值，用于客户端校验, $GUID为固定值
                        $GUID = '258EAFA5-E914-47DA-95CA-C5AB0DC85B11';
                        $secWebSocketAccept = base64_encode(sha1($secWebSocketKey . $GUID, true));
                        // 返回的响应头
                        $responseHeader = "HTTP/1.1 101 Switching Protocol" . PHP_EOL
                            . "Upgrade: WebSocket" . PHP_EOL
                            . "Connection: Upgrade" . PHP_EOL
                            . "Sec-WebSocket-Accept: " . $secWebSocketAccept . PHP_EOL . PHP_EOL;  // 注意这里，需要两个换行（每个header都以\r\n结尾，并且最后一行加上一个额外的空行\r\n）
                        // 应答协议切换请求
                        socket_write($readFD, $responseHeader, strlen($responseHeader));
                        // 保存握手数组，下次不需要再次握手
                        $handShake[(int)$readFD] = $readFD;
                    }
                } else {
                    $content = socket_read($readFD, 2048);
                    $content = trim($content);

                    //判断数据是否为空
                    if (!empty($content)) {
                        $content = frameDecode($content);
                        // 判断是否首次进入
                        if (!isset($nickname[(int)$readFD])) {
                            // 判断昵称是否重复
                            if (in_array($content, $nickname)) {
                                $content = 'name already exits, please change the name! ' . PHP_EOL;
                                $content = frameEncode($content);
                                socket_write($readFD, $content);
                                continue;
                            }
                            $nickname[(int)$readFD] = $content;
                            $content = "welcome $content to join in chatting!" . PHP_EOL;
                        } else {
                            // 增加名称前缀，方便识别
                            $content = $nickname[(int)$readFD] . ": " . $content . PHP_EOL;
                        }

                        // 转发给其他客户端
                        foreach ($socketFDList as $key => $socketFD) {
                            // 排除服务端
                            if ($socketFD == $serverFD) {
                                continue;
                            }

                            $frameEncodeData = frameEncode($content);
                            socket_write($socketFD, $frameEncodeData, strlen($frameEncodeData));
                        }

                    }
                }

            }
        }
    }
}
socket_close($serverFD);

// 解析帧数据
function frameDecode($buffer)
{
    // $buffer[1] 为帧数据的第二个字节，ord转为ascii码的值。 Payload len（7）占了第二个字节的后七位。 &为位运算，127 为 01111111, 按位与后得到Payload len
    $len = ord($buffer[1]) & 127;
    // 1.（FIN+RSV1+RSV2+RSV3+opcode（4））
    // 2.（MASK+Payload len（7））
    // 3.（Extended payload length，当payload len长度为126时，为16 bite；长度为127时则为64 bite，126以下，则为0）
    // 4.（Masking-key，客户端发送则为4 byte，服务端则为0）
    // 5. Payload Data，单位Byte
    if ($len === 126) {
        // offset 4 为上面 第1点 + 第二点 + 第三点 的 2个字节。length 4 为 第4点长度。
        $masks = substr($buffer, 4, 4);
        $data = substr($buffer, 8);
    } else if ($len === 127) {
        $masks = substr($buffer, 10, 4);
        $data = substr($buffer, 14);
    } else {
        $masks = substr($buffer, 2, 4);
        $data = substr($buffer, 6);
    }
    $res = '';
    // 掩码算法
    for ($index = 0; $index < strlen($data); $index++) {
        $res .= $data[$index] ^ $masks[$index % 4];
    }
    return $res;
}

// 帧编码
function frameEncode($content)
{
    // 数据长度
    $len = strlen($content);

    // 这边仅实现传输文本帧！第一个字节，文本帧 1000 0001 => 129
    // 如果需要例如二进制帧，用于传输大文件，请另行实现
    $first_byte = chr(129);

    if ($len <= 125) {
        // payload length = 7bit 支持的最大范围！
        $second_byte = chr($len);
    } else {
        if ($len <= 65535) {
            // payload length = 7 , extended payload length = 16bit，支持的最大范围 65535（2的16次方）
            // 最后16bit 被解释为无符号整数，排序为：大端字节序（网络字节序）
            $second_byte = chr(126) . pack('n', $len);
        } else {
            // payload length = 7，extended payload length = 64bit
            // 最后 64 位被解释为无符号整数，大端字节序（网络字节序）
            $second_byte = chr(127) . pack('J', $len);
        }
    }

    $content = $first_byte . $second_byte . $content;
    return $content;
}

