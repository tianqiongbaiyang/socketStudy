<?php

use Workerman\{Worker, Connection\TcpConnection, Protocols\Http\Request};

require_once __DIR__ . '/vendor/autoload.php';

$http_worker = new Worker('http://0.0.0.0:2345');
// 匿名函数回调
$http_worker->onMessage = function (TcpConnection $connection, Request $data) {
    $connection->send('hello world');
};
Worker::runAll();