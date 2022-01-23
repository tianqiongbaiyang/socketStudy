<?php
$eventBase = new EventBase();

echo $eventBase->getMethod() . "\n";

// 返回支持的功能的位掩码
$features = $eventBase->getFeatures();

// 位运算后判断是否支持对应功能
if ($features & EventConfig::FEATURE_ET) {
    echo "边缘触发\n" . PHP_EOL;
}
if ($features & EventConfig::FEATURE_O1) {
    echo "01添加删除事件\n";
}
if ($features & EventConfig::FEATURE_FDS) {
    echo "任意文件描述符，不光socket\n";
}

echo '-------------' . PHP_EOL;

$eventConfig = new EventConfig;
$eventConfig->avoidMethod('epoll');
$eventBase = new EventBase($eventConfig);

$features = $eventBase->getFeatures();
// 位运算后判断是否支持对应功能
if ($features & EventConfig::FEATURE_ET) {
    echo "边缘触发\n" . PHP_EOL;
}
if ($features & EventConfig::FEATURE_O1) {
    echo "01添加删除事件\n";
}
if ($features & EventConfig::FEATURE_FDS) {
    echo "任意文件描述符，不光socket\n";
}
echo $eventBase->getMethod() . "\n";
