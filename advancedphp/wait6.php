<?php
$pid = pcntl_fork();
if ($pid == 0) {
    // 在子进程中
    // 子进程休眠20秒钟后直接退出
    cli_set_process_title('php child process');
    sleep(20);
    exit;
} elseif ($pid > 0) {
    cli_set_process_title('php father process');
    // 父进程不断while循环，去反复执行pcntl_waitpid()，从而试图解决已经退出的子进程
    while (true) {
        sleep(1);
        $wait_result = pcntl_waitpid($pid, $status, WNOHANG);
        //会输出20个0,第21个是子进程退出后返回的子进程号,第22个开始输出-1,那为何第22个开始一直是-1,因为当找不到子进程时,或者错误时是返回-1的,而0只代表当前子进程没有退出
        echo $wait_result . "\n";
    }
} else {
    exit('fork erro.' . "\n");
}