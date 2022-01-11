<?php

use Workerman\Worker;

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker();
$worker->onWorkerStart = function () {
    $mqtt = new Workerman\Mqtt\Client('mqtt://test.mosquitto.org:1883');
    $mqtt->onConnect = function ($mqtt) {
        $mqtt->publish('test2', 'hello workerman mqtt');
    };
    $mqtt->connect();
};

Worker::runAll();