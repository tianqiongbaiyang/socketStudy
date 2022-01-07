<?php

use Workerman\{Worker, Connection\AsyncTcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker();
$worker->onWorkerStart = function ($worker) {
    $con = new AsyncTcpConnection('ws://echo.websocket.org:80');
    $con->onConnect = function (AsyncTcpConnection $con) {
        $con->send('hello');
    };
    $con->onMessage = function (AsyncTcpConnection $con, $msg) {
        echo "recv $msg\n";
    };
    $con->onClose = function (AsyncTcpConnection $con) {
        // 如果连接断开，则在1秒后重连
        $con->reconnect(1);
    };
    $con->connect();
};

Worker::runAll();