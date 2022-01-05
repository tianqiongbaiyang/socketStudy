<?php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;

require_once __DIR__ . '/vendor/autoload.php';

// 每个进程最多执行请求数
define('MAX_REQUEST', 30);

$http_worker = new Worker("http://0.0.0.0:2345");
$http_worker->onMessage = function (TcpConnection $connection, $data) {
    // 已经处理请求数
    static $request_count = 0;

    $connection->send('hello http');
    // 如果请求数达到
    if (++$request_count >= MAX_REQUEST) {
        echo $request_count . "\n";
        echo posix_getpid() . "\n";
        /*
         * 退出当前进程，主进程会立刻重新启动一个全新进程补充上来
         * 从而完成进程重启
         */
        Worker::stopAll();
    }
};

Worker::runAll();