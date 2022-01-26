<?php
//function logger($fileName){
//    $fileHandle = fopen($fileName,'a');
//    while(true){
//        fwrite($fileHandle,yield."\n");
//    }
//}
//
//$logger = logger(__DIR__.'/log');
//$logger->send('foo');
//$logger->send('bar');

//function gen(){
//    $ret = (yield 'yield1');
//    var_dump($ret);
//    $ret =(yield 'yield2');
//    var_dump($ret);
//}
//
//$gen  = gen();
////var_dump($gen->current());   // string(6) "yield1"
//
//// send 向生成器中传入一个值，并且当做 yield 表达式的结果，然后继续执行生成器。
//var_dump($gen->send('ret1'));
//
//echo '-------'."\n";
//var_dump($gen->current());
//echo '********'."\n";
//var_dump($gen->send('ret2'));

function gen()
{
    yield 'foo';
    $e = yield 'bar';
    echo yield;
}

$gen = gen();
var_dump($gen->send('something'));

