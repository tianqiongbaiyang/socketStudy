<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');
$worker->onWorkerStart = function ($worker) {
    // 将db实例存储在全局变量中(也可以存储在某类的静态成员中)
    global $db;
    // 172.17.0.2为mysql容器（docker）IP
    $db = new \Workerman\MySQL\Connection('172.17.0.2', 3306, 'root', 'root', 'mysql');
};
$worker->onMessage = function (TcpConnection $connection, $data) {
    // 通过全局变量获得db实例
    global $db;
    // 执行SQL
//    $result = $db->query('show tables');
    $result = $db->select('*')->from('user')->where('User = :user')->bindValues(array('user' => 'root'))->query();
    $connection->send(json_encode($result));
};

Worker::runAll();