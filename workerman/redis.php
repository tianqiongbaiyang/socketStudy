<?php

use Workerman\{Worker, Connection\TcpConnection};
use Workerman\Protocols\Http\{Session, Session\RedisSessionHandler, Request};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');

// redis配置
$config = [
    'host' => '172.17.0.5', // redis服务地址，因为用了docker编排，所以指向redis容器ip
    'port' => 6379
];
// 使用 Workerman\Protocols\Http\Session::handlerClass方法来更改session底层驱动类
Session::handlerClass(RedisSessionHandler::class, $config);

$worker->onMessage = function (TcpConnection $connection, Request $request) {
    $session = $request->session();
    $session->set('name', 'Tom');
    $connection->send($session->get('name'));
};

Worker::runAll();