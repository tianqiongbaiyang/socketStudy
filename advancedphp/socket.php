<?php
$host = '0.0.0.0';
$port = 2345;
$socketFD = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socketFD,$host, $port);
socket_listen($socketFD);

while(true){
    $clientFD = socket_accept($socketFD);
    sleep(5);
    $msg = 'hello world'."\n";
    socket_write($clientFD, $msg, strlen($msg));
    socket_close($clientFD);
}
socket_close($socketFD);