<?php
$child_pid = [];

pcntl_signal(SIGCHLD, function () {
    global $child_pid;
    $child_pid_num = count($child_pid);
    if ($child_pid_num > 0) {
        foreach ($child_pid as $pid_key => $pid_item) {
            $wait_result = pcntl_waitpid($pid_item, $status, WNOHANG);
            // 接受到进程号或者进程号找不到则移除对应pid元素
            if ($wait_result == $pid_item || -1 == $wait_result) {
                unset($child_pid[$pid_key]);
            }
        }
    }
});


for ($i = 1; $i <= 5; $i++) {
    $_pid = pcntl_fork();
    if ($_pid < 0) {
        exit();
    } elseif ($_pid == 0) {
        cli_set_process_title('php worker process');
        sleep(10 * $i);
        // 子进程退出执行，一定要exit，不然就不会fork出5个而是多于5个任务进程了
        exit();
    } else {
        echo $_pid . "\n";
        $child_pid[] = $_pid;
    }
}

// 分发信号
while (true) {
    pcntl_signal_dispatch();
    sleep(1);
}