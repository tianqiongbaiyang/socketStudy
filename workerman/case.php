<?php

use Workerman\Worker;

require_once __DIR__ . '/vendor/autoload.php';


$global = new GlobalData\Client('127.0.0.1:2207');
// 初始化列表
/*$global->user_list =array(1, 2, 3);

// 向user_list原子添加一个值
do{
    $old_value = $new_value=$global->user_list;
    $new_value[] = 4;
}
while(!$global->cas('user_list', $old_value, $new_value));

var_export($global->user_list);*/

$global->some_key = 0;

// 非原子增加
$global->some_key++;
echo $global->some_key . "\n";

// 原子增加
$global->increment('some_key');
echo $global->some_key . "\n";