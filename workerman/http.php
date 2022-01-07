<?php

use Workerman\{Worker, Protocols\Http\Request, Protocols\Http\Response, Connection\TcpConnection};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');
$worker->onMessage = function (TcpConnection $connection, Request $request) {
    //$connection->send($request->get('name'));

    /*    $post = $request->post();
        $connection->send(var_export($post, true));*/

//    echo $request->rawBody();

//    print_r($request->header());

//    echo $request->method();

    /*    echo $request->uri()."\n";
        echo $request->path()."\n";
        echo $request->queryString()."\n";
        echo $request->protocolVersion()."\n";
        echo $request->sessionId()."\n";
    //    $connection->send('success');
    //    $connection->send(new Response(404,[], '<h1>文件未找到</h1>'));
        $response = new Response(200);
    //    $response->withStatus(404);
        $response->withHeaders([
            'Content-Type' => 'application/ json',
            'X-Header-One' => 'Header Value'
        ]);
        $connection->send($response);*/

    $location = 'http://www.baidu.com';
    $response = new Response(302, ['Location' => $location]);
    $connection->send($response);
};

Worker::runAll();
