<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('websocket://0.0.0.0:2345');
$worker->count = 4;
// 端口重用，可用netstat -ant 查看区别
$worker->reusePort = true;
$worker->onMessage = function (TcpConnection $connection, $data) {
    $connection->send('ok');
};
Worker::runAll();

