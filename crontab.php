<?php
use Workerman\{Worker, Timer};
require_once __DIR__ . '/workerman/vendor/autoload.php';

// 不执行任何监听的worker容器，用来处理一些定时任务
$task = new Worker();
$task->onWorkerStart = function(){
    // 每2.5秒执行一次
    $time_interval = 2.5;
    Timer::add($time_interval, function(){
        echo "task run \n";
    });
};

Worker::runAll();