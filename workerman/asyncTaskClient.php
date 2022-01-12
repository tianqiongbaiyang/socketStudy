<?php

use Workerman\{Worker, Connection\AsyncTcpConnection, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

// websocket服务
$worker = new Worker('websocket://0.0.0.0:1883');

$worker->onMessage = function (TcpConnection $ws_connection, $message) {
    // 与远程task服务建立异步连接，ip为远程task服务的ip，如果是本机就是127.0.0.1，如果是集群就是lvs的ip
    $task_connection = new AsyncTcpConnection('Text://127.0.0.1:2345');
    // 任务及参数数据
    $task_data = [
        'function' => 'send_mail',
        'args' => ['from' => 'xxx', 'to' => 'xxx', 'contents' => 'xxx']
    ];
    // 发送数据
    $task_connection->send(json_encode($task_data));
    // 异步获得结果
    $task_connection->onMessage = function (AsyncTcpConnection $task_connection, $task_result) use ($ws_connection) {
        //结果
        var_dump($task_result);
        // 获得结果后记得关闭异步连接
        $task_connection->close();
        // 通知对应的websocket客户端任务完成
        $ws_connection->send('task complete');
    };
    // 执行异步连接
    $task_connection->connect();
};

Worker::runAll();


