<?php
$start_time = time();
$start_mem = memory_get_usage();
$arr = range(1, 10000);
foreach ($arr as $item) {
    echo $item . ',';
}
$end_mem = memory_get_usage();
$end_time = time();
echo 'use memory: ' . ($end_mem - $start_mem) . "\n";
echo 'use time: ' . ($end_time - $start_time) . "\n";