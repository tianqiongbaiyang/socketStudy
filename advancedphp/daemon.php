<?php
//php task.php &
// 这个方法的缺点在于 如果terminal终端关闭 , 无论是正常关闭还是非正常关闭 ,
// 这个php进程都会随着终端关闭而关闭 , 其次是代码中如果有echo或者print_r之类的输出文本 , 会被输出到当前的终端窗口中 。

// nohup php task.php &
// 默认情况下 , 代码中echo或者print_r之类输出的文本会被输出到php代码同级目录的nohup.out文件中 .
// 如果你用exit命令或者关闭按钮等正常手段关闭终端 , 该进程不会被关闭 , 依然会在后台持续运行 .
// 但是如果终端遇到异常退出或者终止 , 该php进程也会随即退出 . 本质上 , 也并非稳定可靠的daemon方案 。

// pcntl_fork() posix_setsid()
// 第一次fork系统调用
$pidA = pcntl_fork();

// 父进程 和 子进程 都会执行下面代码
if ($pidA < 0) {
    // 错误处理: 创建子进程失败时返回-1.
    exit('A fork error');
} elseif ($pidA > 0) {
    // 父进程会得到子进程号，所以这里是父进程执行的逻辑
    exit('A parent process exit' . "\n");
}

// B 作为孤儿进程，被 init 进程托管，此时，进程 B 处于进程组 A 中
// 子进程得到的$pid为0, 所以以下是子进程执行的逻辑
// 进程 B 调用 posix_setsid 要求生成新的进程组，调用成功后当前进程组变为 B
if (posix_setsid() == -1) {
    exit('failed to setsid' . "\n");
}

// 此时进程 B 已经脱离任何的控制终端
// [子进程]  这时候在【进程组B】中，重新fork系统调用（二次fork）
//这是为了防止实际的工作的进程主动关联或者意外关联控制终端，再次 fork 之后生成的新进程由于不是进程组组长，是不能申请关联控制终端的。
$pidB = pcntl_fork();
if ($pidB < 0) {
    exit('B fork error');
} elseif ($pidB > 0) {
    exit('B parent process exit' . "\n");
}
sleep(10);