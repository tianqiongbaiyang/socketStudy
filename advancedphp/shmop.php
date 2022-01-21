<?php
$shmop_key = ftok(__FILE__, 's');
//开辟一块共享内存
//c:创建一个新内存段，或者如果该内存段已存在，尝试打开它进行读写
//$size: 开辟的数据大小 字节
$shmop_id = shmop_open($shmop_key, 'c', 0666, 1024);

$pid = pcntl_fork();
if ($pid > 0) {
    cli_set_process_title('father');

    //写入数据 数据必须是字符串格式 , 最后一个指偏移量
    $size = shmop_write($shmop_id, 'hello world', 0);
    echo 'write into ' . $size . "\n";

} else if ($pid == 0) {
    cli_set_process_title('son');

    //读取的范围也必须在申请的内存范围之内,否则失败。$size为读取的长度,实际数据少于指定大小将会填充空字符
    $content = shmop_read($shmop_id, 0, 100);
    var_dump($content);
    var_dump(trim($content));
    //删除内存块
    shmop_delete($shmop_id);
    pcntl_wait($status);

} else {
    exit('fork failed');
}
