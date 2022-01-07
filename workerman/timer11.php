<?php

use Workerman\Worker;
use Workerman\Timer;

require_once __DIR__ . '/vendor/autoload.php';

class Mail
{
    public function send($timer_id)
    {
        $this->count = empty($this->count) ? 1 : $this->count;
        echo "send mail {$this->count}...\n";
        if ($this->count++ >= 3) {
            echo "Timer::del($timer_id)\n";
            Timer::del($timer_id);
        }
    }
}

$task = new Worker();
$task->onWorkerStart = function (Worker $task) {
    $mail = new Mail();
    $timer_id = Timer::add(1, array($mail, 'send'), array(&$timer_id));
};
Worker::runAll();