<?php
$userId = uniqid();
$redis = new Redis();
$redis->connect('172.17.0.4', 6379);
$redis->incr('totalNum');
if ($goodsId = $redis->rPop('goodsList')) {
    //秒杀成功
    //将幸运用户存在集合中
    $redis->hSet('successList', $userId, $goodsId);
} else {
    //秒杀失败
    //将失败用户计数
    $redis->incr('failNum');
}