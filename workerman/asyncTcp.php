<?php

use Workerman\Worker;
use Workerman\Connection\AsyncTcpConnection;

require_once __DIR__ . '/vendor/autoload.php';

$task = new Worker();
// 进程启动时异步建立一个到www.baidu.com连接对象，并发送数据获取数据
$task->onWorkerStart = function ($task) {
    // 不支持直接指定http，但是可以用tcp模拟http协议发送数据
    //$connection_to_baidu = new AsyncTcpConnection('tcp://www.baidu.com:80');
    // 设置为ssl加密连接
    $connection_to_baidu = new AsyncTcpConnection('tcp://www.baidu.com:443');
    $connection_to_baidu->transport = 'ssl';

    // 当连接建立成功时，发送http请求数据
    $connection_to_baidu->onConnect = function (AsyncTcpConnection $connection_to_baidu) {
        echo "connect success\n";
        $connection_to_baidu->send("GET / HTTP/1.1\r\nHost: www.baidu.com\r\nConnection: keep-alive\r\n\r\n");
    };
    $connection_to_baidu->onMessage = function (AsyncTcpConnection $connection_to_baidu, $http_buffer) {
        echo $http_buffer;
    };
    $connection_to_baidu->onClose = function (AsyncTcpConnection $connection_to_baidu) {
        echo "connection closed\n";
    };
    $connection_to_baidu->onError = function (AsyncTcpConnection $connection_to_baidu, $code, $msg) {
        echo "Error code:$code msg:$msg\n";
    };
    $connection_to_baidu->connect();
};
Worker::runAll();