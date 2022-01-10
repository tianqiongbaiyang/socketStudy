<?php

use Workerman\Worker;

require_once __DIR__ . '/vendor/autoload.php';

$channel_server = new Channel\Server('0.0.0.0', 2207);

if (!defined('GLOBAL_START')) {
    Worker::runAll();
}