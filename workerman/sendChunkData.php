<?php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;
use Workerman\Protocols\Http\Request;
use Workerman\Protocols\Http\Response;
use Workerman\Protocols\Http\Chunk;

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');

$worker->onMessage = function (TcpConnection $connection, Request $request) {
    // 首先发送一个带Transfer-Encoding: chunked头的Response响应
    $connection->send(new Response(200, array('Transfer-Encoding' => 'chunked'), 'hello'));
    // 后续Chunk数据用Workerman\Protocols\Http\Chunk类发送
    $connection->send(new Chunk('第一段数据'));
    $connection->send(new Chunk('第二段数据'));
    $connection->send(new Chunk('第三段数据'));
    //  最后必须发送一个空的chunk结束响应
    $connection->send(new Chunk(''));
};

// 运行worker
Worker::runAll();