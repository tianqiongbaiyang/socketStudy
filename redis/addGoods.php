<?php
$goodsId = 2;
$count = 30;
$redis = new Redis();
$redis->connect('172.17.0.4', 6379);
for ($i = 0; $i < $count; $i++) {
    $redis->lPush('goodsList', $goodsId);
}