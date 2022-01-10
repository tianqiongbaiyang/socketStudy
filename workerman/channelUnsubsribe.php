<?php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker ('http://0.0.0.0:2345');
$worker->onWorkerStart = function () {
    Channel\Client::connect('127.0.0.1', 2207);
    $event_name = 'user_login';
    Channel\Client::on($event_name, function ($event_data) {
        var_dump($event_data);
    });
    Channel\Client::unsubscribe($event_name);
};

Worker::runAll();