<?php

use Workerman\{Worker, Connection\AsyncTcpConnection, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';
// TCP代理
$worker = new Worker('text://0.0.0.0:2345');
$worker->count = 3;

$worker->onConnect = function (TcpConnection $connection) {
    // 建立本地80端口的异步连接
    $connection_to_80 = new AsyncTcpConnection('tcp://www.baidu.com:80');
    // 设置将当前客户端连接的数据导向80端口的连接
    $connection->pipe($connection_to_80);
    // 设置80端口连接返回的数据导向客户端连接
    $connection_to_80->pipe($connection);
    // 执行异步连接
    $connection_to_80->connect();
};
Worker::runAll();
