<?php
error_reporting(E_ALL);
set_time_limit(0);
ob_implicit_flush();

$serverFD = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_set_option($serverFD, SOL_SOCKET, SO_REUSEPORT, 1);
socket_set_option($serverFD, SOL_SOCKET, SO_REUSEADDR, 1);
socket_set_nonblock($serverFD);

$host = '0.0.0.0';
$port = 2345;
socket_bind($serverFD, $host, $port);
socket_listen($serverFD);

$nickname = $handShake = $client = $eventArray = [];

while (true) {
    $eventBase = new EventBase();
    $event = new Event($eventBase, $serverFD, Event::READ | Event::PERSIST, function ($serverFD) use (&$client, &$eventBase, &$eventArray, &$handShake, &$nickname) {
        $clientFD = socket_accept($serverFD);
        if ($clientFD !== false) {
            $client[intval($clientFD)] = $clientFD;

            $event = new Event($eventBase, $clientFD, Event::READ | Event::PERSIST, function ($clientFD) use (&$client, &$eventBase, &$eventArray, &$handShake, &$nickname) {
                socket_set_nonblock($clientFD);

                $content = socket_read($clientFD, 2048);

                if (!isset($handShake[(int)$clientFD])) {
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
                        socket_write($clientFD, $responseHeader, strlen($responseHeader));
                        // 保存握手数组，下次不需要再次握手
                        $handShake[(int)$clientFD] = $clientFD;
                    }

                } else {
                    //判断数据是否为空
                    if (!empty($content)) {
                        $content = frameDecode($content);
                        $content = trim($content);

                        // 判断是否首次进入
                        if (!isset($nickname[(int)$clientFD])) {
                            // 判断昵称是否重复
                            if (in_array($content, $nickname)) {
                                $content = 'name already exits, please change the name! ';
                                $content = frameEncode($content);
                                socket_write($clientFD, $content);
                            } else {
                                $nickname[(int)$clientFD] = $content;
                                $content = "welcome $content to join in chatting!";

                                foreach ($client as $socketFD) {
                                    $frameEncodeData = frameEncode($content);
                                    socket_write($socketFD, $frameEncodeData, strlen($frameEncodeData));
                                }
                            }
                        } else {
                            // 增加名称前缀，方便识别
                            $content = $nickname[(int)$clientFD] . ": " . $content;

                            foreach ($client as $socketFD) {
                                $frameEncodeData = frameEncode($content);
                                socket_write($socketFD, $frameEncodeData, strlen($frameEncodeData));
                            }
                        }
                    }
                }

            }, $clientFD);
            $event->add();

            $eventArray[intval($clientFD)] = $event;
        }

    }, $serverFD);
    $event->add();

    $eventBase->loop();
}

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

