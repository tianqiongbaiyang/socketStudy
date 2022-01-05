<?php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;
use Workerman\Protocols\Http\Request;

require_once __DIR__ . '/vendor/autoload.php';

$http_worker = new Worker("http://0.0.0.0:2345");

// 匿名函数回调
$http_worker->onMessage = 'on_message';

// 普通函数
function on_message(TcpConnection $connection, Request $request)
{
    // 向浏览器发送hello world
    $connection->send('hello world');
}

Worker::runAll();