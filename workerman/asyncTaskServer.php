<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

// task worker，使用Text协议
$task_worker = new Worker('Text://0.0.0.0:2345');
// task进程数可以根据需要多开一些
$task_worker->count = 100;
$task_worker->name = 'TaskWorker';
$task_worker->onMessage = function (TcpConnection $connection, $task_data) {
    // 假设发来的是json数据
    $task_data = json_decode($task_data, true);
    var_dump($task_data);
    // 根据task_data处理相应的任务逻辑.... 得到结果，这里省略....
    $connection->send(json_encode($task_data));
};

Worker::runAll();