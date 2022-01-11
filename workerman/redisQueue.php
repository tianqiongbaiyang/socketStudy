<?php

use Workerman\Worker;
use Workerman\Timer;
use Workerman\RedisQueue\Client;

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker();
$worker->onWorkerStart = function () {
    $client = new Client('redis://172.17.0.4:6379');
    // 订阅
    $client->subscribe('test', function ($data) {
        var_export($data);
    });
    // 定时向队列发送消息
    Timer::add(1, function () use ($client) {
        $client->send('test', ['some', 'data']);
    });
};

Worker::runAll();

