<?php

use Workerman\{Worker, Timer};

require_once __DIR__ . '/vendor/autoload.php';

$task = new Worker();
// 开启多少个进程运行定时任务，注意业务是否在多进程有并发问题
$task->count = 1;
$task->onWorkerStart = function (Worker $task) {
    $time_interval = 2.5;
    Timer::add($time_interval, function () {
        echo 'task run' . PHP_EOL;
    });
};
Worker::runAll();