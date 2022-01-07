<?php

use Workerman\Worker;
use Workerman\Timer;

require_once __DIR__ . '/vendor/autoload.php';

$task = new Worker();
$task->onWorkerStart = function (Worker $task) {
    $count = 1;
    // 要想$timer_id能正确传递到回调函数内部，$timer_id前面必须加地址符 &
    $timer_id = Timer::add(1, function () use (&$timer_id, &$count) {
        echo "Timer run $count\n";
        if ($count++ >= 3) {
            echo "Timer::del($timer_id)\n";
            Timer::del($timer_id);
        }
    });
};
Worker::runAll();