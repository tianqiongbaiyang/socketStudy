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

$fp = fopen('lock.txt', 'w+');
if (!flock($fp, LOCK_EX | LOCK_NB)) {
    echo '系统繁忙，请稍后再试';
    return;
}

mysqli_query($conn, 'BEGIN');
$sql = "select number from ih_store where goods_id='$goods_id' and sku_id='$sku_id'";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs);

if ($row['number'] > 0) {
    $order_sn = build_order_no();
    $sql = "insert into ih_order(order_sn,user_id,goods_id,sku_id,price)
    values('$order_sn','$user_id','$goods_id','$sku_id','$price')";
    $order_rs = mysqli_query($conn, $sql);

    $sql = "update ih_store set number=number-{$number} where sku_id='$sku_id'";
    $store_rs = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn)) {
        insertLog('success');
        mysqli_query($conn, 'COMMIT');
        flock($fp, LOCK_UN);
    } else {
        insertLog('failed');
        mysqli_query($conn, 'ROLLBACK');
    }
} else {
    insertLog('not enough');
    mysqli_query($conn, 'ROLLBACK');
}
fclose($fp);