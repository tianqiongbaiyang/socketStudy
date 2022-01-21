<?php
$host = '0.0.0.0';
$port = 2345;
$socketFD = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
socket_bind($socketFD, $host, $port);
socket_listen($socketFD);
cli_set_process_title('phpserver master process');

// 按照数量fork出固定个数子进程
for($i=1;$i<=3;$i++){
    $pid = pcntl_fork();
    if($pid == 0){
        cli_set_process_title('phpserver worker process');
        while(true){
            $clientFD = socket_accept($socketFD);
            $msg = 'hello world'."\n";
            socket_write($clientFD,$msg, strlen($msg));
            socket_close($clientFD);
        }
    }
}

// 主进程不可以退出，代码演示比较粗暴，为了不保证退出直接走while循环，休眠一秒钟
// 实际上，主进程真正该做的应该是收集子进程pid，监控各个子进程的状态等等
while( true ){
    sleep( 1 );
}
socket_close($socketFD);