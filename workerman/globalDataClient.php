<?php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;

require_once __DIR__ . '/vendor/autoload.php';

// 连接Global Data服务端
/*$global = new GlobalData\Client('127.0.0.1:2207');

// 触发$global->__isset('somedata')查询服务端是否存储了key为somedata的值
isset($global->somedata);

// 触发$global->__set('somedata',array(1,2,3))，通知服务端存储somedata对应的值为array(1,2,3)
$global->somedata = array(1, 2, 3);

// 触发$global->__get('somedata')，从服务端查询somedata对应的值
var_export($global->somedata);

// 触发$global->__unset('somedata'),通知服务端删掉somedata及对应的值
unset($global->somedata);*/

/*$global_worker = new GlobalData\Server('0.0.0.0',2207);

$worker = new Worker('tcp://0.0.0.0:2345');
$worker->onWorkerStart=function(){
// 初始化一个全局的global data client
    global $global;
    $global =new \GlobalData\Client('127.0.0.1:2207');
};
$worker->onMessage = function(TcpConnection $connnection, $data){
    // 更改$global->somedata的值，其它进程会共享这个$global->somedata变量
    global $global;
    echo "new global->somdata=".var_export($global->somedata,true)."\n";
    echo "set \$global->somedata=$data";
    $global->somedata =$data;
};*/

$global = new GlobalData\Client('127.0.0.1:2207');

// 逗号作为参数间隔符号，句号是字符串连接符
if ($global->add('some_key', 10)) {
    echo 'add success ', $global->some_key;
} else {
    echo "add fail ", var_export($global->some_key);
}

Worker::runAll();