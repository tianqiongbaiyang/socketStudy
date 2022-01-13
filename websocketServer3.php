<?php

use Workerman\{Worker, Connection\TcpConnection, Timer};

require_once __DIR__ . '/workerman/vendor/autoload.php';

$worker = new Worker('websocket://0.0.0.0:2345');
$worker->name = 'chat';
$worker->count = 1;

$connectionGroup = $userInfoGroup = [];

$worker->onConnect = function (TcpConnection $connection) {
    global $connectionGroup;
    // 保存连接信息
    if (!isset($connectionGroup[$connection->id])) {
        $connectionGroup[$connection->id] = $connection;
    }
};

$worker->onWorkerStart = function ($worker) {
    global $connectionGroup;
    // 心跳检测
    Timer::add(10, function () use ($worker, $connectionGroup) {
        foreach ($connectionGroup as $con) {
            if (!empty($con->lastMessageTime)) {
                if (time() - $con->lastMessageTime > 55) {
                    $con->close();
                }
            }

        }
    });
};

$worker->onMessage = function (TcpConnection $connection, $data) {
    $connection->lastMessageTime = time();

    $data = json_decode($data, true);
    // 心跳包默认不处理
    if (isset($data['heartBeat'])) {
        return;
    }

    global $userInfoGroup;
    global $connectionGroup;
    $activeConnection = count($connectionGroup);
    if (isset($data['nickname']) && !isset($userInfoGroup[$connection->id]['nickname'])) {
        // 保存昵称
        $userInfoGroup[$connection->id]['nickname'] = $data['nickname'];
        $content = " is coming...";
    } else {
        $content = ': ' . $data['content'];
    }

    // 转发信息
    foreach ($connectionGroup as $con) {
        $result = [
            'content' => $userInfoGroup[$connection->id]['nickname'] . $content,   // 内容
            'activeConnection' => $activeConnection,    // 当前在线人数
            'contracts' => array_column(array_values($userInfoGroup), 'nickname')   // 人员列表
        ];
        $con->send(json_encode($result));
    }
};

$worker->onClose = function (TcpConnection $connection) {
    global $userInfoGroup;
    global $connectionGroup;
    $result = ['content' => $userInfoGroup[$connection->id]['nickname'] . ' existed...'];

    // 注销连接信息
    unset($userInfoGroup[$connection->id]);
    unset($connectionGroup[$connection->id]);

    $result['activeConnection'] = count($connectionGroup);
    $result['contracts'] = array_column(array_values($userInfoGroup), 'nickname');
    foreach ($connectionGroup as $con) {
        $con->send(json_encode($result));
    }
};

Worker::runAll();