<?php

use Workerman\{Worker, Timer, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

class Mail
{
    // 注意这个是静态方法，回调函数属性也必须是public
    public static function send($to, $content)
    {
        echo 'send mail ...' . PHP_EOL;
    }


}

$task = new Worker();
$task->onWorkerStart = function (Worker $task) {
    $to = 'workerman@workerman.net';
    $content = 'hello workerman';
    // 定时调用类的静态方法
    Timer::add(2, array('Mail', 'send'), array($to, $content), false);
};
Worker::runAll();