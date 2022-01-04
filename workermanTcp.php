<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/workerman/vendor/autoload.php';

$tcp_worker = new Worker('tcp://0.0.0.0:2345');
$tcp_worker->count = 4;

$tcp_worker->onMessage = function (TcpConnection $connection, $data) {
    $connection->send('hello ' . $data);
};
Worker::runAll();
?>