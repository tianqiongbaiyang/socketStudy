<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');
$worker->onMessage = function (TcpConnection $connection, $data) {
    var_dump($data);
    $connection->send('receive success');
};
$worker->onClose = function (TcpConnection $connection) {
    echo 'connection closed' . PHP_EOL;
};

Worker::runAll();