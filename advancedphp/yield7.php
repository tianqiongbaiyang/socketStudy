<?php
//初始化 cURL 会话
$ch1 = curl_init();
// 这个地址中的php，我故意sleep了5秒钟，然后输出一坨json
curl_setopt($ch1, CURLOPT_URL, 'http://www.selfctrler.com/index.php/test/test1');
curl_setopt($ch1, CURLOPT_HEADER, 0);

// 返回一个新cURL批处理句柄
$mh = curl_multi_init();
//向curl批处理会话中添加单独的curl句柄
curl_multi_add_handle($mh, $ch1);

function gen1($mh, $ch1)
{
    do {
        //运行当前 cURL 句柄的子连接,$still_running: 一个用来判断操作是否仍在执行的标识的引用。
        $mrc = curl_multi_exec($mh, $running);
        // 请求发出后，让出cpu
        yield;
    } while ($running > 0);

    //如果设置了CURLOPT_RETURNTRANSFER，则返回获取的输出的文本流。
    $ret = curl_multi_getcontent($ch1);
    echo $ret . "\n";
    return false;
}

function gen2()
{
    for ($i = 1; $i <= 10; $i++) {
        echo 'gen2: ' . $i . "\n";
        file_put_contents('./yield.log', 'gen2' . $i, FILE_APPEND);
        sleep(2);
        yield;
    }
}

$gen1 = gen1($mh, $ch1);
$gen2 = gen2();
while (true) {
    echo $gen1->current();
    echo $gen2->current();
    $gen1->next();
    $gen2->next();
}
