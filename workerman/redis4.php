<?php

use Workerman\{Worker, Redis\Client, Connection\TcpConnection, Timer};

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker('http://0.0.0.0:2345');

$worker->onWorkerStart = function () {
    global $redis;
//    $redis =new Client('redis://172.17.0.4:6379');
    $redis = new Client('redis://172.17.0.4:6379', [
        'connect_timeout' => 6// 设置连接超时6秒，不设置默认5秒
    ], function ($success, $redis) {
        // 连接结果回调
        if (!$success) var_dump($redis->error());
    });
    // 省略回调
//    $redis->select(2);
//    $redis->select('test', function($result, $redis){
//        // select参数必须为数字，所以这里$result为false
//        var_dump($result, $redis->error());
//    });
//    $redis->get('key',function($result){
//        // 如果key不存在则返回NULL，发生错误则返回false
//        var_dump($result);
//    });
    $redis->set('key', 'value');
    $redis->set('key', 'value', function ($result) {
    });
    // 第三个参数可以传递过期时间，10秒后过期
    $redis->set('key', 'value', 10);
    $redis->set('key', 'value', 10, function ($result) {
    });
    // 注意第二个参数传递过期时间，单位秒
    $redis->setEx('key', 3600, 'test');
    // pSetEx 单位为毫秒
    $redis->pSetEx('key', 3600, 'test1');
    // 删除一个key
//    $redis->del('key');
    // 删除多个key
    $redis->del(['key', 'key1', 'key2']);
    $redis->get('key', function ($result) {
        var_dump($result);
    });
    $redis->setNx('key', 'value', function ($result) {
        var_dump($result); // 1
    });
    $redis->setNx('key', 'value', function ($result) {
        var_dump($result);  // 0
    });
    $redis->exists('key', function ($result) {
        var_dump($result); // 1
    });
    $redis->exists('key2', function ($result) {
        var_dump($result);  // 0
    });
    $redis->mset(['foo' => 'foo', 'bar' => 'bar', 'baz' => 'baz']);
    $redis->exists(['foo', 'bar', 'baz'], function ($result) {
        var_dump($result); // 3
    });
    $redis->incr('key1', function ($result) {
        var_dump($result);
    });
    $redis->incrBy('key1', 10, function ($result) {
        var_dump($result);
    });
//    $redis->incrByFloat("key1",1.5,function($result){
//       var_dump($result);
//    });
    $redis->decr('key1', function ($result) {
        var_dump($result);
    });
    $redis->decrBy('key1', 4, function ($result) {
        var_dump($result);
    });
    $redis->mGet(['key1', 'key', 'key3'], function ($result) {
        var_dump($result);// [null, 'value1', null];
    });
    $redis->getSet('key', 'Tom', function ($result) {
        var_dump($result);
    });
//    $redis->randomKey(function($key)use ($redis){
//        $redis->get($key,function($result){
//            var_dump($result);
//        });
//    });

    $redis->select(0); // switch to DB 0
    $redis->set('x1', '42');// write 42 to x1
    $redis->move('x1', 1, function ($result) {// move to DB 1
        var_dump($result);//1
    });
    $redis->select(1); // switch to DB 1
    $redis->get('x1', function ($result) {
        var_dump($result);// '42'
    });

    $redis->rename('x1', 'y', function ($result) {
        var_dump($result); // true
    });
    $redis->get('x1', function ($result) {
        var_dump($result);
    });
    $redis->get('y', function ($result) {
        var_dump($result);
    });

    $redis->renameNx('x1', 's', function ($result) {
        var_dump($result);
    });
    $redis->get('s', function ($result) {
        var_dump($result);
    });
    $redis->renameNx('y', 's1', function ($result) {
        var_dump($result);
    });
    $redis->get('s1', function ($result) {
        var_dump($result);
    });

    $redis->set('x', 42);
    $redis->expire('x', 3);

    $redis->keys('*', function ($keys) {
        var_dump($keys);
    });
    $redis->keys('user*', function ($keys) {
        var_dump($keys);
    });

    $redis->type('x', function ($result) {
        var_dump($result); // string set list zset hash none
    });

    $redis->append('x', 'value2', function ($result) {
        var_dump($result);
    });
    $redis->get('x', function ($result) {
        var_dump($result);
    });

    $redis->set('key', 'string value');
    $redis->getRange('key', 0, 5, function ($result) {
        var_dump($result); // 'string'
    });
    $redis->getRange('key', -5, -1, function ($result) {
        var_dump($result); // 'value'
    });

    $redis->setRange('key', 7, "redis", function ($result) {
        var_dump($result);
    });
    $redis->get('key', function ($result) {
        var_dump($result);
    });

    $redis->strlen('key', function ($result) {
        var_dump($result);
    });

    $redis->set('key3', "\x7f"); // this is 0111 1111
    $redis->getBit('key3', 1, function ($result) {
        var_dump($result);  // 1
    });

    $redis->set('key4', "*"); // ord("*") = 42 = 0x2f = "0010 1010"
    $redis->setBit("key4", 5, 1, function ($result) {
        var_dump($result); // 0
    });

    $redis->set('key5', 'abc');
    $redis->bitOp('AND', 'dst', 'key5', 'key6', function ($result) {
        var_dump($result); // 3
    });
    $redis->get('key6', function ($result) {
        var_dump($result);
    });

    $redis->sAdd('d', 5);
    $redis->sAdd('d', 4);
    $redis->sAdd('d', 2);
    $redis->sAdd('d', 1);
    $redis->sAdd('d', 3);
    $redis->sort('d', [], function ($result) {
        var_dump($result);  // 1, 2, 3, 4, 5
    });
    $redis->sort('d', ['sort' => 'desc'], function ($result) {
        var_dump($result); // 5, 4, 3, 2, 1
    });

    $redis->set('key', 'value', 10);
    // 秒为单位
    $redis->ttl('key', function ($result) {
        var_dump($result); // 10
    });
    // 毫秒为单位
    $redis->pttl('key', function ($result) {
        var_dump($result);
    });
    // key 不存在
    $redis->pttl('key-not-exists', function ($result) {
        var_dump($result);  // -2
    });

    $redis->set('aa', 'cc', 100);
    $redis->persist('aa', function ($result) {
        var_dump($result);
    });

    $redis->mSet(['key0' => 'value0', 'key1' => 'value1'], function ($result) {
        var_dump($result);
    });

    $redis->hSet('h', 'key1', 'hello', function ($r) {
        var_dump($r); // 1
    });
    $redis->hGet('h', 'key1', function ($r) {
        var_dump($r); //hello
    });
    $redis->hSet('h', 'key1', 'plop', function ($r) {
        var_dump($r);  // 0
    });
    $redis->hGet('h', 'key1', function ($r) {
        var_dump($r); //plop
    });

    $redis->hSetNx('j', 'key1', 'hello', function ($r) {
        var_dump($r); // 1
    });
    $redis->hSetNx('j', 'key1', 'world', function ($r) {
        var_dump($r); // 0
    });

    $redis->hGet('j', 'key1', function ($result) {
        var_dump($result);
    });

    $redis->hSet('j', 'key2', 'world');
    $redis->hLen('j', function ($result) {
        var_dump($result);  // 2
    });

    $redis->hDel('j', 'key1', function ($r) {
        var_dump($r);
    });

    $redis->hKeys('j', function ($result) {
        var_dump($result);
    });

    $redis->hVals('j', function ($result) {
        var_dump($result);
    });

    $redis->hSet('j', 'name', 'Tom');
    $redis->hGetAll('j', function ($result) {
        var_export($result);
    });

    $redis->hExists('j', 'ccc', function ($result) {
        var_dump($result);
    });

    $redis->hIncrBy('h', 'x', 2, function ($result) {
        var_dump($result);
    });

    $redis->hMSet('h', ['name' => 'Joe', 'sex' => 1]);
    $redis->hGetAll('h', function ($result) {
        var_dump($result);
    });

    $redis->hMGet('h', ['sex'], function ($result) {
        var_dump($result);
    });

    $host = '172.17.0.4';
    $port = 6379;

    $redis->rPush('key9', 'A');
    $redis->rPush('key9', 'B');
    $redis->lindex('key9', 0, function ($r) {
        var_dump($r); // A
    });

    $redis->del('key1');
    $redis->lInsert('key1', 'after', 'A', 'X', function ($r) {
        var_dump($r); // 0
    });
    $redis->lPush('key1', 'A');
    $redis->lPush('key1', 'B');
    $redis->lPush('key1', 'C');
    $redis->lInsert('key1', 'before', 'C', 'X', function ($r) {
        var_dump($r); // 4
    });
    $redis->lRange('key1', 0, -1, function ($r) {
        var_dump($r); // ['A', 'B', 'X', 'C']
    });

    $redis->rPush('key8', 'A');
    $redis->rPush('key8', 'B');
    $redis->lPop('key8', function ($r) {
        var_dump($r); // A
    });

    $redis->lPush('key11', 'A');
    $redis->lPush('key11', ['B', "C"]);
    $redis->lRange('key11', 0, -1, function ($r) {
        var_dump($r); // ['C', 'B','A']
    });

    $redis->del('key1');
    $redis->lPush('key1', 'A');
    $redis->lPush('key1', ['B', "C"], function ($r) {
        var_dump($r); // 3
    });
    $redis->lRange('key1', 0, -1, function ($r) {
        var_dump($r); // ['C', 'B', 'A']
    });

    $redis->rPush('key12', 'A');
    $redis->rPush('key12', 'B');
    $redis->rPush('key12', 'C');
    $redis->lRange('key12', 0, -1, function ($r) {
        var_dump($r);
    });

    $redis->lSet('key1', 0, 'X');

    $redis->del('key1');
    $redis->rPush('key1', 'A');
    $redis->rPush('key1', 'B');
    $redis->rPush('key1', 'C');
    $redis->lRange('key1', 0, -1, function ($r) {
        var_dump($r); // ['A', 'B', 'C']
    });
    $redis->lTrim('key1', 0, 1);
    $redis->lRange('key1', 0, -1, function ($r) {
        var_dump($r); // ['A', 'B']
    });

    $redis->rPop('key1', function ($r) {
        var_dump($r);
    });

    $redis->del('key1');
    $redis->sAdd('key1', 'member1');
    $redis->sAdd('key1', ['member2', 'member3'], function ($r) {
        var_dump($r);  // 2
    });
    $redis->sAdd('key1', 'member2', function ($r) {
        var_dump($r);  // 0
    });

    $redis->sCard('key1', function ($r) {
        var_dump($r);
    });
    $redis->sCard('key1111', function ($r) {
        var_dump($r);
    });

    $redis->del('key2');
    $redis->sAdd('key2', 'member3');
    $redis->del('key3');
    $redis->sAdd('key3', 'member2');
    $redis->sDiff(['key1', 'key3', 'key2'], function ($r) {
        var_dump($r);  // member1
    });

    $redis->sAdd('key2', 'member1');
    $redis->sAdd('key3', 'member1');
    $redis->sInter(['key1', 'key2', 'key3'], function ($r) {
        var_dump($r);  // member1
    });

    $redis->sInterStore('output', 'key1', 'key2', 'key3', function ($r) {
        var_dump($r);
    });
    $redis->sMembers('output', function ($r) {
        var_dump($r);
    });

    $redis->sIsMember('key1', 'member1', function ($r) {
        var_dump($r);
    });

    $redis->sMembers('key1', function ($r) {
        var_dump($r);
    });

    $redis->sMove('key1', 'key2', 'member3');

    $redis->sPop('key1', function ($r) {
        var_dump($r);
    });

    $redis->sPop('key2', 3, function ($r) {
        var_dump($r);
    });
};

$worker->onMessage = function (TcpConnection $connection, $data) {
    $connection->send('hello');
};

Worker::runAll();
