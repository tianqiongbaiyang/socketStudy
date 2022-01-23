<?php
//初始化一个EventConfig
$eventConfig = new EventConfig();
//根据EventConfig初始化一个EventBase
$eventBase = new EventBase($eventConfig);
// 初始化一个定时器event
// -1为定时器事件 Event::TIMEOUT表示在超时后变为活动的事件，Event::PERSIST表示事件是持久的
$timer = new Event($eventBase, -1, Event::TIMEOUT | Event::PERSIST, function () {
    echo microtime(true) . PHP_EOL;
});
//tick间隔为0.05秒钟
$tick = 0.05;
// 使事件挂起
$timer->add($tick);
//调度挂起的事件
$eventBase->loop();
