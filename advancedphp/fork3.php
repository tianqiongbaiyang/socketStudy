<?php
//for($i=1;$i<=3;$i++){
//    $pid = pcntl_fork();
//    if($pid > 0){
//        // do nothing...
//    } elseif($pid==0){
//        echo 'son'.PHP_EOL;
//    }
//}

for ($i = 1; $i <= 3; $i++) {
    $pid = pcntl_fork();
    if ($pid > 0) {
        // do nothing...
    } elseif ($pid == 0) {
        echo 'son' . PHP_EOL;
        exit;
    }
}