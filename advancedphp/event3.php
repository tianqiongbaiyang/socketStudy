<?php
// 查看当前系统平台支持的IO多路复用的方法都有哪些？
$method = Event::getSupportedMethods();
print_r($method);

// 查看当前用的方法是哪一个？
$eventBase = new EventBase();
echo 'current event method: ' . $eventBase->getMethod() . "\n";

$eventConfig = new EventConfig;
// 避免使用方法epoll(mac下叫kqueue)
$eventConfig->avoidMethod('epoll');
$eventBase = new EventBase($eventConfig);
echo 'current event method: ' . $eventBase->getMethod() . "\n";