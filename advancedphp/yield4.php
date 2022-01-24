<?php
function yield_range($start, $end)
{
    while ($start <= $end) {
        $ret = yield $start;
        $start++;
        echo "yield receive: $ret\n";
    }
}

$generator = yield_range(1, 10);
$generator->send($generator->current() * 10);