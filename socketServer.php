<?php
// socket server

error_reporting(E_ALL);
// 设置永不超时，允许脚本挂起等待连接
set_time_limit(0);
// 打开绝对（隐式）刷送，显示请求内容
ob_implicit_flush();

$address = '127.0.0.1';
$port = 10000;

/**
 * socket_create(): 创建一个套接字（通讯节点）, 正确时返回一个 Socket 实例（监听socket描述字），失败时返回 false 。
 * AF_INET：IPv4 网络协议。 TCP 和 UDP 都可使用此协议。
 * SOCK_STREAM：提供一个顺序化的、可靠的、全双工的、基于连接的字节流。支持数据传送流量控制机制。TCP 协议即基于这种流式套接字
 * SOL_TCP：使用TCP协议
 * socket_last_error(): 捕获错误代码
 * socket_strerror(): 捕获错误描述
 */
if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo 'socket_create() failed: reason: ' . socket_strerror(socket_last_error()) . PHP_EOL;
}

/**
 * socket_bind(): 绑定地址和端口，成功时返回 true， 或者在失败时返回 false 。
 */
if (socket_bind($sock, $address, $port) === false) {
    echo 'socket_bind() failed: reason: ' . socket_strerror(socket_last_error($sock)) . PHP_EOL;
}

/**
 * backlog: 最大请求队列处理数，超过的其他请求将被忽略或不被处理。
 * socket_listen(): 监听socket实例上的连接，成功时返回 true， 或者在失败时返回 false 。
 */
if (socket_listen($sock, 5) === false) {
    echo 'socket_listen() failed: reason: ' . socket_strerror(socket_last_error($sock)) . PHP_EOL;
}

do {
    /**
     * socket_accept(): 接受套接字上的连接，连接成功后返回新的socket实例（已连接socket描述字）。
     * 如果套接字上有多个连接排队，将使用第一个连接。如果没有挂起的连接，socket_accept()将阻塞，直到出现连接。
     */
    if (($msgsock = socket_accept($sock)) === false) {
        echo 'socket_accept() failed: reason: ' . socket_strerror(socket_last_error($sock)) . PHP_EOL;
        break;
    }

    // 发送指令
    $msg = PHP_EOL . 'Welcome to the PHP Test Server.' . PHP_EOL .
        'To quit, type "quit".To shut down the server type "shutdown"' . PHP_EOL;
    /**
     * socket_write(): 写入套接字
     * length: 指定写入套接字的备用字节长度。如果此长度大于缓冲区长度，则它会被静默地截断为缓冲区的长度。
     */
    socket_write($msgsock, $msg, strlen($msg));

    do {
        /**
         * socket_read(): 从套接字中读取最大长度的数据，返回一个字符串，表示接收到的数据。如果发生了错误（包括远程主机关闭了连接），则返回 false 。
         * length: 指定了最大能够读取的字节数。否则您可以使用 \r、\n、\0 结束读取（根据 mode 参数设置）。
         * PHP_NORMAL_READ: 读取到 \n、\r 时停止。
         */
        if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
            echo 'socket_read() failed: reason: ' . socket_strerror(socket_last_error($msgsock)) . PHP_EOL;
            // 跳出两层循环
            break 2;
        }

        if (!$buf = trim($buf)) {
            continue;
        }
        if ($buf == 'quit') {
            // 退出当前客户端
            break;
        }
        if ($buf == 'shutdown') {
            // 关闭连接
            socket_close($msgsock);
            break 2;
        }
        $talkback = 'PHP: You said ' . $buf . PHP_EOL;
        socket_write($msgsock, $talkback, strlen($talkback));
        echo $buf . PHP_EOL;

    } while (true);
    socket_close($msgsock);
} while (true);
socket_close($sock);