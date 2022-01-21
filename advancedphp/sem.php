<?php
// Get the file token key
$key = ftok(__FILE__, 'c');
// key值只能为int类型
$shar_key = 1;

// 创建一个共享内存
// resource type
$shm_id = shm_attach($key, 1024, 0666);
if($shm_id===false){
    exit('unable to create the shared memory segment'."\n");
}

$pid = pcntl_fork();
if ($pid > 0){
    // 设置一个值
    shm_put_var($shm_id, $shar_key, 'test');
    pcntl_wait($status);
} else {
    // 检测一个key是否存在
    var_dump(shm_has_var($shm_id, $shar_key));

    // 获取一个值
    var_dump(shm_get_var($shm_id, $shar_key));

    // 删除一个key
    shm_remove_var($shm_id, $shar_key);

    var_dump(shm_has_var($shm_id, $shar_key));

    // 从unix 系统中删除共享内存,所有数据都将被销毁。 须先删除后再断开连接
    shm_remove($shm_id);

    // 从共享内存段断开， unix系统中仍然存在共享内存，并且数据仍然存在。
    shm_detach($shm_id);
}