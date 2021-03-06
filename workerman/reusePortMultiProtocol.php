<?php
use Workerman\Worker;
use Workerman\Connection\TcpConnection;
require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('text://0.0.0.0:2015');
$worker->count = 4;
// 每个进程启动后在当前进程新增一个监听
$worker->onWorkerStart = function($worker)
{
$inner_worker = new Worker('http://0.0.0.0:2016');
/**
* 多个进程监听同一个端口（监听套接字不是继承自父进程）
* 需要开启端口复用，不然会报Address already in use错误
*/
//$inner_worker->reusePort = true;
$inner_worker->onMessage = 'on_message';
// 执行监听
$inner_worker->listen();
};

$worker->onMessage = 'on_message';

function on_message(TcpConnection $connection, $data)
{
$connection->send("hello\n");
}

// 运行worker
Worker::runAll();