<?php
// 设置umask为0，这样，当前进程创建的文件权限则为777
umask(0);
$pid = pcntl_fork();
if ($pid < 0) {
    exit('fork error.');
} elseif ($pid > 0) {
    // 主进程退出
    exit();
}

// 子进程继续执行
if (!posix_setsid()) {
    exit('setsid error.');
}

$pid = pcntl_fork();
if ($pid < 0) {
    exit('fork error');
} elseif ($pid > 0) {
    exit;
}

cli_set_process_title('php master process');
sleep(10);