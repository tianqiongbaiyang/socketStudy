<?php
$pid = pcntl_fork();
if ($pid > 0) {
    cli_set_process_title('php father process');
    // pcntl_wait函数挂起当前进程的执行直到一个子进程退出或接收到一个信号要求中断当前进程或调用一个信号处理函数。
    //如果一个子进程在调用此函数时已经退出（俗称僵尸进程），此函数立刻返回。子进程使用的所有系统资源将被释放。
    //pcntl_wait() 将会存储状态信息到 status 参数上，这个通过 status 参数返回的状态信息可以用以下函数
    // pcntl_wifexited(), pcntl_wifstopped(), pcntl_wifsignaled(), pcntl_wexitstatus(), pcntl_wtermsig() 以及 pcntl_wstopsig() 获取其具体的值。
    $wait_result = pcntl_wait($status);
    sleep(6);
} elseif ($pid == 0) {
    cli_set_process_title('php child process');
    sleep(3);
} else {
    exit('fork error.' . PHP_EOL);
}