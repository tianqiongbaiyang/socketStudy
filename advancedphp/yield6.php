<?php
//function gen1(){
//    for($i=1;$i<=10;$i++){
//        echo 'gen1: '.$i."\n";
//        sleep(2);
//        yield;
//    }
//}
//function gen2(){
//    for($i=1;$i<=10;$i++){
//        echo 'gen2: '.$i."\n";
//        sleep(2);
//        yield;
//    }
//}
//$task1 = gen1();
//$task2=gen2();
//while(true){
//    echo $task1->current();
//    echo $task2->current();
//    $task2->next();
//    $task1->next();
//}

function gen1()
{
    for ($i = 1; $i <= 10; $i++) {
        echo 'gen1: ' . $i . "\n";
        sleep(2);
    }
}

function gen2()
{
    for ($i = 1; $i <= 10; $i++) {
        echo 'gen2: ' . $i . "\n";
        sleep(2);
    }
}

gen1();
gen2();
