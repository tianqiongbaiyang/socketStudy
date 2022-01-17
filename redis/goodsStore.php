<?php
$store = 5;
$redis = new Redis();
$result = $redis->connect('172.17.0.4', 6379);

$res = $redis->llen('goods_store');
echo $res;
$count = $store - $res . "<br>";
for ($i = 0; $i < $count; $i++) {
    $redis->lpush('goods_store', 1);
}
echo $redis->llen('goods_store');