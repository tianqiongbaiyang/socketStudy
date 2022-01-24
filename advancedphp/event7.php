<?php
$host = '0.0.0.0';
$port = 2345;
// 创建一个监听socket，这个一个阻塞IO的socket
$listen = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
socket_bind($listen,$host, $port);
socket_listen($listen);
//  这里设置非阻塞！
//socket_set_nonblock($listen);
while(true){
    // socket_accept也是阻塞的，虽然有while，但是由于accept是阻塞的，所以这段代码不会进入无限死循环中
    $connect = socket_accept($listen);
    if($connect){
        echo 'new client'.intval($connect)."\n";
    } else{
        echo 'fail'."\n";
    }
}
