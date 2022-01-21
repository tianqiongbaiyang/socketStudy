<?php
// 共享内存+信号量 通信
$shm_key = ftok(__FILE__, 's');
$shm_id = shm_attach($shm_key, 1024, 0666);
const SHARE_KEY = 1;
$childList = [];

//加入信号量
$sem_key = ftok(__FILE__, 'd');
$sem_id = sem_get($sem_key);

for ($i = 0; $i < 3; $i++) {
    $pid = pcntl_fork();
    if ($pid == -1) {
        exit('fork fail!' . PHP_EOL);
    } else if ($pid == 0) {
        // 获得信号量
        sem_acquire($sem_id);

        if (shm_has_var($shm_id, SHARE_KEY)) {
            $count = shm_get_var($shm_id, SHARE_KEY);
            $count++;

            $sec = rand(1, 3);
            sleep($sec);

            shm_put_var($shm_id, SHARE_KEY, $count);
        } else {
            $count = 0;
            $sec = rand(1, 3);
            sleep($sec);

            shm_put_var($shm_id, SHARE_KEY, $count);
        }

        echo "child process " . posix_getpid() . " is writing ! now count is $count \n";
        // 用完释放
        sem_release($sem_id);
        exit();

    } else {
        $childList[$pid] = 1;
    }
}

while (!empty($childList)) {
    $childPid = pcntl_wait($status);
    if ($childPid > 0) {
        unset($childList[$childPid]);
    }
}

$count = shm_get_var($shm_id, SHARE_KEY);
echo 'final count is ' . $count . PHP_EOL;

shm_remove($shm_id);
shm_detach($shm_id);

// 完美的处理了进程之间抢资源的问题，实现了操作的原子性！
