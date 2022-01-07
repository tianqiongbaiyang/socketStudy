<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

// 设置所有连接的默认应用层发送缓冲区大小
TcpConnection::$defaultMaxSendBufferSize = 2 * 1024 * 1024;
// 设置每个连接接收的数据包最大为1024000字节
TcpConnection::$defaultMaxPackageSize = 1024000;

$worker = new Worker('tcp://0.0.0.0:2345');
$worker->onConnect = function (TcpConnection $connection) {
    $connection->send("hello \n");
    echo $connection->id . "\n";
    $connection->protocol = 'Workerman\\Protocols\\Text';
    // 设置当前连接的应用层发送缓冲区大小，会覆盖掉默认值
    $connection->maxSendBufferSize = 102400;
    echo "new connection from ip ".$connection->getRemoteIp()."\n";
    echo "new connection from port " .$connection->getRemotePort()."\n";
    $connection->close("close connection \n");
};
// 当一个客户端发来数据时，转发给当前进程所维护的其它所有客户端
$worker->onMessage = function (TcpConnection $connection, $data) {
    foreach ($connection->worker->connections as $con) {
        $con->send($data);
    }
};
Worker::runAll();