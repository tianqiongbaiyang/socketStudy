<?php

use Workerman\{Worker, Connection\TcpConnection, Timer};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('text://0.0.0.0:2345');
$worker->onConnect = function ($connection) {
    // 给connection对象动态添加一个属性，用来保存当前连接发来多少个请求
    $connection->messageCount = 0;
};
$worker->onMessage = function (TcpConnection $connection, $data) {
    // 每个连接接收10个请求后就不再接收数据
    $limit = 2;
    if (++$connection->messageCount > $limit) {
        $connection->pauseRecv();
        // 5秒后恢复接收数据
        Timer::add(5, function ($connection) {
            $connection->resumeRecv();
        }, array($connection), false);
    }
    echo 'hello' . PHP_EOL;
    $connection->send('hi' . PHP_EOL);
};

Worker::runAll();