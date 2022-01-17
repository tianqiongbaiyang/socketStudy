<?php
//php task.php &
// nohup php task.php &
//echo 'test';
$pid = pcntl_fork();
if ($pid < 0) {
    exit('fork error. ');
} elseif ($pid > 0) {
    exit(' parent process. ');
}

// 将当前子进程提升会会话组组长
if (!posix_setsid()) {
    exit(' setsid error. ');
}

for ($i = 1; $i <= 100; $i++) {
    sleep(1);
    file_put_contents('daemon.log', $i, FILE_APPEND);
}