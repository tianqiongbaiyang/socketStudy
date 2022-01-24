<?php
$host = '0.0.0.0';
$port = 2345;
$fd = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_set_option($fd, SOL_SOCKET, SO_REUSEADDR, 1);
socket_set_option($fd, SOL_SOCKET, SO_REUSEPORT, 1);
socket_bind($fd, $host, $port);
socket_listen($fd);
// 注意，将“监听socket”设置为非阻塞模式
socket_set_nonblock($fd);

// 这里值得注意，我们声明两个数组用来保存 事件 和 连接socket
$event_arr = [];
$conn_arr = [];

$event_base = new EventBase();
$event = new Event($event_base, $fd, Event::READ | Event::PERSIST, function ($fd) {
    // 使用全局的event_arr 和 conn_arr
    global $event_arr, $conn_arr, $event_base;
    // 非阻塞模式下，注意accept的写法会稍微特殊一些。如果不想这么写，请往前面添加@符号，不过不建议这种写法
    if (($conn = socket_accept($fd)) !== false) {
        echo 'new client connected! ' . intval($conn) . "\n";
        // 将连接socket也设置为非阻塞模式
        socket_set_nonblock($conn);
        // 此处值得注意，我们需要将连接socket保存到数组中去
        $conn_arr[intval($conn)] = $conn;
        $event = new Event($event_base, $conn, Event::READ | Event::PERSIST, function ($conn) {
            global $conn_arr;
            $buffer = socket_read($conn, 65535);
            foreach ($conn_arr as $conn_item) {
                if ($conn != $conn_item) {
                    $msg = intval($conn) . 'say: ' . $buffer;
                    socket_write($conn_item, $msg, strlen($msg));
                }
            }
        }, $conn);
        $event->add();
        // 此处值得注意，我们需要将事件本身存储到全局数组中，如果不保存，连接会话会丢失，也就是说服务端和客户端将无法保持持久会话
        $event_arr[intval($conn)] = $event;
    }
}, $fd);
$event->add();
$event_base->loop();