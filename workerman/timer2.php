<?php

use Workerman\{Worker, Timer};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker();
$worker->count = 4;
$worker->onWorkerStart = function (Worker $worker) {
    // 只在id编号为0的进程上设置定时器，其它1、2、3号进程不设置定时器
    if ($worker->id === 0) {
        Timer::add(1, function () {
            echo "4个worker进程，只在0号进程设置定时器\n";
        });
    }
};

Worker::runAll();