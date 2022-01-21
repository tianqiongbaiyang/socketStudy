<?php
//通过操作共享内存实现进程间通信
$shm_key = ftok(__FILE__, 't');
$shm_id = shm_attach($shm_key, 1024, 0666);
const SHARE_KEY = 1;
$childList = [];

// 开3个进程 读写 该内存区域
for ($i = 0; $i < 3; $i++) {
    $pid = pcntl_fork();
    if ($pid == -1) {
        exit('fork failed!' . PHP_EOL);
    } else if ($pid == 0) {
        //子进程从共享内存块中读取 写入值 +1 写回
        if (shm_has_var($shm_id, SHARE_KEY)) {
            // 有值,加一
            $count = shm_get_var($shm_id, SHARE_KEY);
            $count++;

            //模拟业务处理逻辑延迟
            $sec = rand(1, 3);
            sleep($sec);

            shm_put_var($shm_id, SHARE_KEY, $count);
        } else {
            // 无值,初始化
            $count = 0;
            //模拟业务处理逻辑延迟
            $sec = rand(1, 3);
            sleep($sec);

            shm_put_var($shm_id, SHARE_KEY, $count);
        }
        echo "child process " . posix_getpid() . " is writing! now count is $count\n";
        exit("child process " . posix_getpid() . " end!\n");

    } else {
        // 记录子进程pid, 用于回收，避免成为僵尸进程
        $childList[$pid] = 1;
    }
}

// 等待所有子进程结束
while (!empty($childList)) {
    $childPid = pcntl_wait($status);
    if ($childPid > 0) {
        unset($childList[$childPid]);
    }
}

//父进程读取共享内存中的值
$count = shm_get_var($shm_id, SHARE_KEY);
echo 'final count is ' . $count . PHP_EOL;

shm_remove($shm_id);
shm_detach($shm_id);

// 结果：final count 为0，因为三个子进程互相抢占了资源