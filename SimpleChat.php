<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/workerman/vendor/autoload.php';

$global_uid = 0;

// 当客户端连上来时分配uid，并保存连接，并通知所有客户端
function handle_connection($connection)
{
    global $global_uid;
    // 为这个连接分配一个uid
    $connection->uid = ++$global_uid;
}

// 当客户端发送消息过来时，转发给所有人
function handle_message(TcpConnection $connection, $data)
{
    global $text_worker;

    foreach ($text_worker->connections as $conn) {
        $conn->send("user[{$connection->uid}] said: $data");
    }
}

// 当客户端断开时，广播给所有客户端
function handle_close($connection)
{
    global $text_worker;
    foreach ($text_worker->connections as $conn) {
        $conn->send("user[{$connection->uid}] logout");
    }
}

$text_worker = new Worker('text://0.0.0.0:2345');
$text_worker->count = 1;
$text_worker->onConnect = 'handle_connection';
$text_worker->onMessage = 'handle_message';
$text_worker->onClose = 'handle_close';

Worker::runAll();

