<?php
// send file
use Workerman\{Worker, Connection\TcpConnection};
use Workerman\Protocols\Http\{Request, Response};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');
$worker->onMessage = function (TcpConnection $connection, Request $request) {
    $file = __DIR__ . '/../../installGitKraken.dmg';
// 检查if-modified-since头判断文件是否修改过
    if (!empty($if_modified_since = $request->header('if-modified-since'))) {
        $modified_time = date('D, d M Y H:i:s', filemtime($file)) . ' ' . \date_default_timezone_get();
        // 文件未修改则返回304
        if ($modified_time === $if_modified_since) {
            $connection->send(new Response(304));
            return;
        }
    }
    // 文件修改过或者没有if-modified-since头则发送文件
    $response = (new Response())->withFile($file);
    $connection->send($response);
};
Worker::runAll();