<?php
error_reporting(E_ALL);
set_time_limit(0);
ob_implicit_flush();

$socketFD = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$host = '127.0.0.1';
$port = 10000;
socket_bind($socketFD, $host, $port);
socket_listen($socketFD, 1024);

// 遍历所有请求
while(true){
    // 阻塞请求，处理当前请求后再处理下一个客户端请求
    $newSocketFD = socket_accept($socketFD);

    // 遍历每个请求的输入内容
    while(true) {
        $content = socket_read($newSocketFD, 1024, PHP_NORMAL_READ);
        $content = trim($content);
        if (!empty($content)) {
            // 关闭当前请求连接
            if ($content == 'quite') {
                break;
            }
            echo 'input value: ' .$content . PHP_EOL;
        }
    }
    socket_close($newSocketFD);
}
socket_close($socketFD);

