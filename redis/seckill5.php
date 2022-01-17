<?php

$conn = mysqli_connect('172.17.0.2', 'root', 'root');
mysqli_select_db($conn, 'seckill');

$price = 10;
$user_id = 1;
$goods_id = 1;
$sku_id = 11;
$number = 1;

//生成唯一订单号
function build_order_no()
{
    return date('ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}

//记录日志
function insertLog($event, $type = 0)
{
    global $conn;
    $sql = "insert into ih_log(event,type) 
    values('$event','$type')";
    mysqli_query($conn, $sql);
}

$redis = new Redis();
$result = $redis->connect('172.17.0.4', 6379);
$count = $redis->lpop('goods_store');
if (!$count) {
    insertLog('no enough');
    return;
}

$order_sn = build_order_no();
$sql = "insert into ih_order(order_sn,user_id,goods_id,sku_id,price)
        values('$order_sn','$user_id','$goods_id','$sku_id','$price')";
$order_res = mysqli_query($conn, $sql);

$sql = "update ih_store set number=number-{$number} where sku_id='$sku_id'";
$store_res = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn)) {
    insertLog('success');
} else {
    insertLog('failed');
}
