<?php
umask(0);
$pid = pcntl_fork();
if ($pid < 0) {
    exit('fork error');
} elseif ($pid > 0) {
    exit();
}

if (!posix_setsid()) {
    exit('setsid error');
}

$pid = pcntl_fork();
if ($pid < 0) {
    exit('fork error');
} elseif ($pid > 0) {
    exit;
}

cli_set_process_title('test3');
// 一般服务器软件都有写配置项，比如以debug模式运行还是以daemon模式运行。如果以debug模式运行，那么标准输出和错误输出大多数都是直接输出到当前终端上，如果是daemon形式运行，那么错误输出和标准输出可能会被分别输出到两个不同的配置文件中去
// 连工作目录都是一个配置项目，通过php函数chdir可以修改当前工作目录
$dir = '/';
chdir($dir);