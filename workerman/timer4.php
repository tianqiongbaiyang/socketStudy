<?php

use Workerman\{Worker, Timer, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('text://0.0.0.0:2345');
$worker->count = 2;
$worker->onConnect = function (TcpConnection $connection) {
    $connect_time = time();
    $connection->timer_id = Timer::add(2, function ($connection, $connect_time) {
        $connection->send($connect_time);
    }, array($connection, $connect_time));
};
Worker::runAll();