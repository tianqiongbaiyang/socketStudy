    <?php

    use Workerman\Worker;

    require_once __DIR__ . '/vendor/autoload.php';

    $worker = new Worker('http://0.0.0.0:2345');
    $worker->onWorkerStart = function () {
        Channel\Client::connect('127.0.0.1', 2207);
    };

    Worker::runAll();