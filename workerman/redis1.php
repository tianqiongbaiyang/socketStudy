<?php

use Workerman\{Worker, Redis\Client, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');

$worker->onWorkerStart = function () {
    global $redis;
    $redis = new Client('redis://172.17.0.4:6379');
};

$worker->onMessage = function (TcpConnection $connection, $data) {
    global $redis;
    $redis->set('key', 'hello world');
    $redis->get('key', function ($result) use ($connection) {
        $connection->send($result);
    });
};

Worker::runAll();