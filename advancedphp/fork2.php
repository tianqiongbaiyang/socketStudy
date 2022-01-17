<?php
$number = 1;
$pid = pcntl_fork();
if ($pid > 0) {
    $number += 1;
    echo "I am father, number+1: {$number}" . PHP_EOL;
} elseif ($pid == 0) {
    $number += 2;
    echo "I am son, number+2: {$number}" . PHP_EOL;
} else {
    echo 'fork failed' . PHP_EOL;
}