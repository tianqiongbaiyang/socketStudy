<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');
$worker->onConnect = function (TcpConnection $connection) {
    echo 'new connection from ip ' . $connection->getRemoteIp() . PHP_EOL;
};

Worker::runAll();