<?php

use Workerman\{Worker, Redis\Client, Connection\TcpConnection, Timer};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');

$worker->onWorkerStart = function () {
    $host = '172.17.0.4';
    $port = 6379;
    //订阅一个或多个符合给定模式的频道。
//    $redis = new Client("redis://$host:$port");
//    $redis2 = new Client("redis://$host:$port");
//    $redis->psubscribe(['news*','blog*'],function($pattern, $channel,$message){
//echo "$pattern, $channel, $message";// news*, news.add, news content
//    });
//    Timer::add(2,function()use($redis2){
//        $redis2->publish('news.add', 'news content ');
//    });

    //用于订阅给定的一个或多个频道的信息。
    $redis = new Client("redis://$host:$port");
    $redis2 = new Client("redis://$host:$port");
    $redis->subscribe(['news', 'blog'], function ($channel, $message) {
        echo "$channel, $message"; // blog, news content
    });

    Timer::add(2, function () use ($redis2, $port) {
        $redis2->publish('blog', 'news content ');
    });

};

$worker->onMessage = function (TcpConnection $connection, $data) {
    $connection->send('subscribe');
};

Worker::runAll();
