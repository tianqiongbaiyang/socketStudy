<?php

use Workerman\{Worker, Timer, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

use Workerman\Crontab\Crontab;

$worker = new Worker();

// 设置时区，避免运行结果与预期不一致
date_default_timezone_set('PRC');
$worker->onWorkerStart = function () {
    // 每分钟的第1秒执行
    $crontab1 = new Crontab('1 * * * * *', function () {
        echo date('Y-m-d H:i:s') . "\n";
    });
    $crontab2 = new Crontab('50 7 * * *', function () {
        echo date('Y-m-d H:i:s') . "\n";
    });
    static $i = 0;
    $i++;
    if ($i === 2) {
        $crontab1->destroy();
        $crontab2->destroy();
    }

};
Worker::runAll();
