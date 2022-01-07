<?php

use Workerman\{Worker, Connection\AsyncUdpConnection, Timer};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('udp://0.0.0.0:2345');
$worker->onWorkerStart = function () {
    //1秒后启动一个udp客户端，连接2345端口并发送字符串 hi
    Timer::add(1, function () {
        $udp_connection = new AsyncUdpConnection('udp://127.0.0.1:2345');
        $udp_connection->onConnect = function ($udp_connection) {
            $udp_connection->send('hi');
        };
        $udp_connection->onMessage = function ($udp_connection, $data) {
            //收到服务端返回的数据 hello
            echo 'recv ' . $data . PHP_EOL;
            $udp_connection->close();
        };
        $udp_connection->connect();
    }, null, false);
};
$worker->onMessage = function ($connection, $data) {
    // 收到AsyncUdpConnection客户端发来的数据，返回字符串 hello
    $connection->send('hello');
};
Worker::runAll();