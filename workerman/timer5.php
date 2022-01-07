<?php

use Workerman\{Worker, Timer, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

function send_mail($to, $content)
{
    echo "send mail ...\n";
}

$task = new Worker();
$task->onWorkerStart = function (Worker $task) {
    $to = 'workerman@workerman.net';
    $content = 'hello workerman';
// 10秒后执行发送邮件任务，最后一个参数传递false，表示只运行一次
    Timer::add(2, 'send_mail', array($to, $content), false);
};
Worker::runAll();