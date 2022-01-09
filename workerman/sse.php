<?php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;
use Workerman\Protocols\Http\{Request, ServerSentEvents, Response};
use Workerman\Timer;

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');

// 如果Accept头是text/event-stream则说明是SSE请求
$worker->onMessage = function (TcpConnection $connection, Request $request) {
    if ($request->header('accept') === 'text/event-stream') {
        // 首先发送一个 Content-Type: text/event-stream 头的响应
        $connection->send(new Response(200, ['Content-Type' => 'text/event-stream']));
        // 定时向客户端推送数据
        $timer_id = Timer::add(2, function () use ($connection, &$timer_id) {
            // 连接关闭的时候要将定时器删除，避免定时器不断累积导致内存泄漏
            if ($connection->getStatus() !== TcpConnection::STATUS_ESTABLISHED) {
                echo $connection->getStatus() . "\n";
                Timer::del($timer_id);
                return;
            }
            // 发送message事件，事件携带的数据为hello，消息id可以不传
            $connection->send(new ServerSentEvents(
                [
                    'event' => 'message',
                    'data' => 'hello',
                    'id' => 1
                ]
            ));
        });
        return;
    }
    $connection->send('ok');
};

Worker::runAll();