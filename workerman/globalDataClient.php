<?php
require_once __DIR__ . '/vendor/autoload.php';

// 连接Global Data服务端
$global = new GlobalData\Client('127.0.0.1:2207');

// 触发$global->__isset('somedata')查询服务端是否存储了key为somedata的值
isset($global->somedata);

// 触发$global->__set('somedata',array(1,2,3))，通知服务端存储somedata对应的值为array(1,2,3)
$global->somedata = array(1, 2, 3);

// 触发$global->__get('somedata')，从服务端查询somedata对应的值
var_export($global->somedata);

// 触发$global->__unset('somedata'),通知服务端删掉somedata及对应的值
unset($global->somedata);