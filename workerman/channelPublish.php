<?php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');
$worker->onWorkerStart = function ($worker) {
    Channel\Client::connect('127.0.0.1', 2207);
};
$worker->onMessage = function (TcpConnection $connection, $data) {
    $event_name = 'user_login';
    $event_data = array('uid' => 123, 'uname' => 'tom');
    Channel\Client::publish($event_name, $event_data);
};


Worker::runAll();