<?php

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
$socketFDList[] = $serverFD;
// 昵称列表
$nickname = [];
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
                if ($clientFD === false) {
                    echo socket_strerror(socket_last_error($serverFD));
                    break;
                }
                $socketFDList[] = $clientFD;
                // 默认客户端初始化昵称为空
                $nickname[(int)$clientFD] = '';

                echo date('Y-m-d H:i:s') . ' client: ' . $clientFD . ' connected!' . PHP_EOL;
                socket_write($clientFD, 'please input your name: ', 2048);
            } else {
                // 接收数据
                $content = socket_read($readFD, 2048);
                $content = trim($content);
                // 判断数据是否为空
                if (!empty($content)) {
                    // 如果第一次输入，则作为昵称使用
                    if (empty($nickname[(int)$readFD])) {
                        // 判断是否昵称已被使用
                        if (in_array($content, $nickname)) {
                            socket_write($readFD, 'name already in use! please change your name!' . PHP_EOL);
                            break;
                        }

                        $nickname[(int)$readFD] = $content;
                        $content = "welcome $content to join in chatting!" . PHP_EOL;
                    } else {
                        // 追加昵称前缀，方便识别
                        $content = $nickname[(int)$readFD] . ": " . $content . PHP_EOL;
                    }

                    // 转发给其他客户端
                    foreach ($socketFDList as $socketFD) {
                        // 排除自身及服务端
                        if (!in_array($socketFD, [$readFD, $serverFD])) {
                            socket_write($socketFD, $content, strlen($content));
                        }
                    }
                }
            }
        }
    }
}
socket_close($serverFD);
