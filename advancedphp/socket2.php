<?php
$host = '0.0.0.0';
$port = 1883;
$socketFD = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socketFD,$host, $port);
socket_listen($socketFD);

while(true){
    $clientFD = socket_accept($socketFD);
    // 当accept了新的客户端连接后，就fork出一个子进程专门处理
    $pid = pcntl_fork();
    // 在子进程中处理当前连接的请求业务
    if($pid == 0){
        $msg = 'hello world'."\n";
        socket_write($clientFD, $msg, strlen($msg));
        echo time().' : a new client'.PHP_EOL;
        sleep( 10 );
        socket_close($clientFD);
        exit;
    }
}
socket_close($socketFD);