<?php

use Workerman\{Worker, Timer, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

class Mail
{
    public function send($to, $content)
    {
        echo 'send mail ...' . PHP_EOL;
    }

    public function sendLater($to, $content)
    {
        Timer::add(2, array($this, 'send'), array($to, $content), false);
    }
}

$task = new Worker();
$task->onWorkerStart = function (Worker $task) {
    $mail = new Mail();
    $to = 'workerman@workerman.net';
    $content = 'hello workerman';
    $mail->sendLater($to, $content);
};
Worker::runAll();