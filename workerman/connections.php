<?php

use Workerman\{Worker, Lib\Timer};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('text://0.0.0.0:2345');

Worker::$stdoutFile = '/tmp/stdout.log';
Worker::$pidFile = '';
Worker::$logFile = '';
Worker::$daemonize = true;

$worker->name = 'stdoutFile';
$worker->count = 4;
$worker->user = 'www-data';
$worker->reloadable = true;

$worker->onWorkerStart = function ($worker) {
    Timer::add(10, function () use ($worker) {
        foreach ($worker->connections as $connection) {
            $connection->send(time());
        }
    });
    echo 'success';
};
Worker::runAll();