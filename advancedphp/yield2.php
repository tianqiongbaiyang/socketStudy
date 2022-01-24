<?php
$start_mem = memory_get_usage();
$start_time = time();
function yield_range($start, $end)
{
    while ($start <= $end) {
        $start++;
        yield $start;
    }
}

foreach (yield_range(0, 9999) as $item) {
    echo $item . ',';
}
$end_mem = memory_get_usage();
$end_time = time();
echo 'use mem: ' . ($end_mem - $start_mem) . 'bytes' . "\n";
echo 'use time: ' . ($end_time - $start_time) . "\n";
