<?php
$host = '0.0.0.0';
$port = 2345;
$socketFD = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
socket_bind($socketFD, $host,$port);
socket_listen($socketFD);

socket_set_nonblock($socketFD);

$eventBase = new EventBase();
// 创建一个事件,将“监听socket”添加到事件监听中，触发条件是read，
//也就是说，一旦“监听socket”上有客户端来连接，就会触发这里，我们在回调函数里来处理接受到新请求后的反应
$event = new Event($eventBase, $socketFD, Event::READ|Event::PERSIST,
function($socketFD){
    // 为什么写成这样比较执拗的方式？因为，“监听socket”已经被设置成了非阻塞，这种情况下，accept是立即返回的，
    //所以，必须通过判定accept的结果是否为true来执行后面的代码。
    //一些实现里，包括workerman在内，可能是使用@符号来压制错误，个人不太建议这样做
    if(($clientFD = socket_accept($socketFD)) !== false){
        echo 'new client connected: '.intval($clientFD)."\n";

        $msg = "HTTP/1.0 200 OK\r\nContent-Length: 2\r\n\r\nHi";
        socket_write($clientFD, $msg, strlen($msg));
    }
}
,$socketFD);

$event->add();
$eventBase->loop();

