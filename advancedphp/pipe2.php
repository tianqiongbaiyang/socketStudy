<?php
//两个子进程向一个文件中写信息，父进程负责监听检测这个文件是否写入完成，完成之后，将这个文件copy一份。
//这里，父子进程之间通过管道通信，确认是否完成写入。

//创建管道
$pipePath = '/tmp/test.pipe';
if (!file_exists($pipePath)) {
    if (!posix_mkfifo($pipePath, 0666)) {
        exit('make pipe fail' . "\n");
    }
}

//创建两个子进程写文件
for ($i = 0; $i < 2; $i++) {
    $pid = pcntl_fork();
    if ($pid == 0) {
        //写入文件
        file_put_contents('./pipe.log', $i . " write pipe\n", FILE_APPEND);

        $file = fopen($pipePath, 'w');
        //向管道中写标识，标识写入完毕。
        fwrite($file, $i . "\n");
        fclose($file);
        //退出子进程
        exit();
    }
}

//父进程要做的是：
//1、读取管道中的写出状态,判断是否完全写完
//2、拷贝写好的文件
//3、删除管道
//4、回收进程
$file = fopen($pipePath, 'r');
$line = 0;
while (1) {
    $end = fread($file, 1024);
    foreach (str_split($end) as $c) {
        if ("\n" == $c) {
            $line++;
        }
    }

    if ($line == 2) {
        copy('./pipe.log', './pipe_copy.log');
        fclose($file);
        unlink($pipePath);
        pcntl_wait($status);
        exit("ok \n");
    }
}