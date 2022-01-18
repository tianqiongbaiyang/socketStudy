<?php
$pid = pcntl_fork();
if ($pid > 0) {
    cli_set_process_title('php father process');
    // 返回值保存在$wait_result中
    // $pid参数表示 子进程的进程ID
    // 子进程状态则保存在了参数$status中
    $wait_result = pcntl_waitpid($pid, $status);
    var_dump($wait_result) . "\n";
    var_dump($status);
    sleep(8);
} elseif ($pid == 0) {
    cli_set_process_title('php child process');
    sleep(4);
} else {
    exit('fork error.' . PHP_EOL);
}