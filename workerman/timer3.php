<?php

use Workerman\{Worker, Timer, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('text://0.0.0.0:2345');
$worker->count = 2;
// 连接建立时给对应连接设置定时器
$worker->onConnect = function (TcpConnection $connection) {
    $time_interval = 4;
    $connect_time = time();
    //给connection对象临时添加一个timer_id属性保存定时器id
    $connection->timer_id = Timer::add($time_interval, function () use ($connection, $connect_time) {
        $connection->send($connect_time);
    });
};
// 连接关闭时，删除对应连接的定时器
$worker->onClose = function (TcpConnection $connection) {
    Timer::del($connection->timer_id);
};
Worker::runAll();