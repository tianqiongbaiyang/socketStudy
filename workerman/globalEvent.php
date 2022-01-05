<?php

use Workerman\{Worker, Events\EventInterface};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker();
$worker->count = 2;
$worker->onWorkerStart = function ($worker) {
    echo 'Pid is ' . posix_getpid() . "\n";
    // 当进程收到SIGALRM信号时，打印输出一些信息
    Worker::$globalEvent->add(SIGALRM, EventInterface::EV_SIGNAL, function () {
        echo "Get signal SIGALRM\n";
    });
};
Worker::runAll();