<?php
$eventConfig = new EventConfig();
$eventBase = new EventBase($eventConfig);
$event = new Event($eventBase, SIGTERM, Event::SIGNAL | Event::PERSIST, function () {
//$event = new Event($eventBase,SIGTERM, Event::SIGNAL, function(){
    echo "signal term\n";
});
$event->add();
echo 'loop' . "\n";
$eventBase->loop();