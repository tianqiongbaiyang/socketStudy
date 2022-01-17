<?php
$connection = mysqli_connect('172.17.0.2', 'root', 'root');
mysqli_select_db($connection, 'seckill');

$price = 10;
$user_id = 1;
$goods_id = 1;
$sku_id = 11;
$number = 1;

//生成唯一订单
function getOrderSn()
{
    return date('ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}

//记录日志
function insertLog($event, $type = 0)
{
    global $connection;
    $sql = "insert into ih_log(event,type) 
values('$event','$type')";
    mysqli_query($connection, $sql);
}

mysqli_query($connection, "BEGIN");   //开始事务

//此时这条记录被锁住,其它事务必须等待此次事务提交后才能执行
$sql = "select number from ih_store where goods_id = '$goods_id' and sku_id='$sku_id' for update";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['number'] > 0) {
    $order_sn = getOrderSn();
    $sql = "insert into ih_order(order_sn, user_id,goods_id,sku_id,price)
values('$order_sn','$user_id','$goods_id','$sku_id','$price')";
    $res = mysqli_query($connection, $sql);

    $sql = "update ih_store set number=number-{$number} where sku_id='$sku_id'";
    $res = mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection)) {
        insertLog('库存减少成功');
        mysqli_query($connection, "COMMIT");//事务提交即解锁

    } else {
        insertLog('库存减少失败');
        mysqli_query($connection, "ROLLBACK");
    }
} else {
    insertLog('库存不够');
    mysqli_query($connection, "ROLLBACK");
}