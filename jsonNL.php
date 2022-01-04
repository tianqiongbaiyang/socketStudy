<?php

use Workerman\{Worker, Connection\TcpConnection};

require_once __DIR__ . '/workerman/vendor/autoload.php';

$json_worker = new Worker('JsonNL://0.0.0.0:2345');
$json_worker->onMessage = function (TcpConnection $connection, $data) {
    // $data就是客户端传来的数据，数据已经经过JsonNL::decode处理过
    print_r($data);
    // $connection->send的数据会自动调用JsonNL::encode方法打包，然后发往客户端
    $connection->send(['code' => 0, 'msg' => 'ok']);
};
Worker::runAll();