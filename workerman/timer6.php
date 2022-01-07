<?php

use Workerman\{Worker, Timer, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

class Mail
{
    // 注意，回调函数属性必须是public
    public function send($to, $content)
    {
        echo "send mail ...\n";
    }
}

$task = new Worker();
$task->onWorkerStart = function ($task) {
    $mail = new Mail();
    $to = 'workerman@workerman.net';
    $content = 'hello workerman';
    Timer::add(2, array($mail, 'send'), array($to, $content), false);
};
Worker::runAll();