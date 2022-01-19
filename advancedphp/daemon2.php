<?php
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

cli_set_process_title('test');
for ($i = 0; $i < 20; $i++) {
    sleep(1);
    echo 'test' . PHP_EOL;
}