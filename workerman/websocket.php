<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('websocket://0.0.0.0:2345');
$worker->count = 4;
$worker->onMessage = function (TcpConnection $connection, $data) {
    $connection->send('hello' . $data);
};
Worker::runAll();

