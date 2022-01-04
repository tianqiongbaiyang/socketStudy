<?php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('text://0.0.0.0:2345');
// 指定传输层协议
$worker->transport = 'udp';
$worker->onMessage = function (TcpConnection $connection, $data) {
    $connection->send('Hello');
};
Worker::runAll();