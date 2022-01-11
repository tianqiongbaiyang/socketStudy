<?php

use Workerman\{Worker, Redis\Client, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');

$worker->onWorkerStart = function () {
    global $redis;
//    $redis =new Client('redis://172.17.0.4:6379');
    $redis = new Client('redis://172.17.0.4:6379', [
        'connect_timeout' => 6// 设置连接超时6秒，不设置默认5秒
    ], function ($success, $redis) {
        // 连接结果回调
        if (!$success) var_dump($redis->error());
    });
};

$worker->onMessage = function (TcpConnection $connection, $data) {
    global $redis;
    $redis->set('key', 'hello world');
    // 设置回调函数判断set调用结果
    $redis->set('key', 'value', function ($result, $redis) {
        var_dump($result); // true
    });
// 回调函数都是可选测参数，这里省略了回调函数
    $redis->set('key1', 'value1');
// 回调函数可以嵌套
    $redis->get('key', function ($result, $redis) {
        $redis->set('key2', 'value2', function ($result) {
            var_dump($result);
        });
    });

    $redis->get('key', function ($result) use ($connection) {
        $connection->send($result);
    });
};

Worker::runAll();
