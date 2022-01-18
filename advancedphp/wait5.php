<?php
$pid = pcntl_fork();
if ($pid > 0) {
    cli_set_process_title('php father process');
    // 将第三个option参数设置为常量WNOHANG，则可以避免主进程阻塞挂起，此时父进程将立即返回继续往下执行剩下的代码
    $wait_result = pcntl_waitpid($pid, $status, WNOHANG);
    //$wait_result大于0代表子进程已退出,返回的是子进程的pid,非阻塞时0代表没取到退出子进程,为什么会没有取到子进程,因为当时子进程没有退出,在休眠sleep
    var_dump($wait_result);
    var_dump($status);
    echo "不阻塞，运行到这里" . PHP_EOL;
    sleep(8);
} else if (0 == $pid) {
    cli_set_process_title('php child process');
    // 让子进程休息10秒钟，但是进程结束后，父进程不对子进程做任何处理工作，这样这个子进程就会变成僵尸进程
    sleep(4);
} else {
    exit('fork error.' . PHP_EOL);
}