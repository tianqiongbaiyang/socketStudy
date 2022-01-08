<?php

use Workerman\{Worker, Connection\TcpConnection, Protocols\Http\Request};
use Workerman\Protocols\Http\Session\FileSessionHandler;

require_once __DIR__ . '/vendor/autoload.php';

// 设置session文件存储位置
FileSessionHandler::sessionSavePath('/tmp/session');

$worker = new Worker('http://0.0.0.0:2345');

$worker->onMessage = function (TcpConnection $connection, Request $request) {
    $session = $request->session();
    $session->put(['sex' => '1', 'home' => 'xxxx', 'age' => 22]);
    $session->set('name', 'Tom');
    print_r($session->all()) . "\n";
//    $session->flush();
    print_r($session->all()) . "\n";
    print_r($session->has('name'));
    $session->delete('age');
    $session->pull('name');
    echo $session->get('age', 25) . "\n";
    $connection->send($session->get('name'));
};

Worker::runAll();