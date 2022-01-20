<?php
//父子进程通过消息队列通信
//参数为路径+标识符，返回key值
$msg_key = ftok(__FILE__, 'a');
// 创建消息队列, 0666为权限
$msg_queue = msg_get_queue($msg_key, 0666);

echo '-------起始的消息队列状态---------';
var_dump(msg_stat_queue($msg_queue));

$pid = pcntl_fork();
if ($pid == 0) {
    //子进程向父进程报告。指定message_type，必须是大于0的整型
    msg_send($msg_queue, 1, 'father i am ' . getmypid() . " and i am working!");
    echo '当前进程id: ' . posix_getpid() . "\n";
    sleep(10);
    exit();

} else if ($pid) {
    //获取消息队列信息。desired_message_type 为0代表获取所有的message_type信息。$received_message_type 为接受到的信息类型
    msg_receive($msg_queue, 0, $message_type,
        1024, $message);
    echo '-----当前收到信息为：' . $message . "----------\n";
    echo '-------结束的消息队列状态---------';
    var_dump(msg_stat_queue($msg_queue));
    sleep(10);
    // 用完了记得清理删除消息队列
    msg_remove_queue($msg_queue);
    pcntl_wait($status);
}