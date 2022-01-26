<?php
// 多任务调度
require_once __DIR__ . '/Task.php';

//调度器
class Scheduler
{
    protected $maxTaskId = 0;
    protected $taskMap = [];  // taskId=>task
    protected $taskQueue;

    public function __construct()
    {
        $this->taskQueue = new SplQueue();
    }

    public function killTask($tid)
    {
        if (!isset($this->taskMap[$tid])) {
            return false;
        }
        unset($this->taskMap[$tid]);

        foreach ($this->taskQueue as $id => $task) {
            if ($task->getTaskId() === $tid) {
                unset($this->taskQueue[$id]);
                break;
            }
        }
        return true;
    }

    public function newTask(Generator $coroutine)
    {
        $tid = ++$this->maxTaskId;
        $task = new Task($tid, $coroutine);
        $this->taskMap[$tid] = $task;
        $this->schedule($task);
        return $tid;
    }

    public function schedule(Task $task)
    {
        $this->taskQueue->enqueue($task);
    }

    public function run()
    {
        while (!$this->taskQueue->isEmpty()) {
            $task = $this->taskQueue->dequeue();
//            $task->run();
            $retval = $task->run();
            if ($retval instanceof SystemCall) {
                $retval($task, $this);
                continue;
            }

            if ($task->isFinished()) {
                unset($this->taskMap[$task->getTaskId()]);
            } else {
                $this->schedule($task);
            }
        }
    }
}

// 简单任务调度器
function task1()
{
    for ($i = 1; $i <= 10; ++$i) {
        echo 'This is task 1 iteration ' . $i . "\n";
        yield;
    }
}

function task2()
{
    for ($i = 1; $i <= 5; $i++) {
        echo 'this is task 2 iteration ' . $i . "\n";
        yield;
    }
}

$scheduler = new Scheduler;
$scheduler->newTask(task1());
$scheduler->newTask(task2());
$scheduler->run();