<?php
function yield_range($start, $end)
{
    while ($start <= $end) {
        $start++;
        yield $start;
    }
}

$generator = yield_range(1, 10);
var_dump($generator);

while ($generator->valid()) {
    echo $generator->current() . PHP_EOL;
    $generator->next();
}