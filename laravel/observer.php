<?php
/**
 * 观察者接口类
 * Interface Observer
 */
interface Observer
{
    public function update($event_info = null);
}

/**
 * 观察者1
 */
class Observer1 implements Observer
{
    public function update($event_info = null)
    {
        echo "观察者1 收到执行通知 执行完毕！<br>";
    }
}

/**
 * 观察者2
 */
class Observer2 implements Observer
{
    public function update($event_info = null)
    {
        echo "观察者2 收到执行通知 执行完毕！<br>";
    }
}

/**
 * 事件
 * Class Event
 */
class ObserverEvent
{
    //用于观察者注册的数组
    public $observers = [];

    //增加观察者
    public function add(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    //事件通知
    public function notify()
    {
        foreach($this->observers as $observer){
            $observer->update();
        }
    }

    /**
     * 触发事件
     */
    public function trigger()
    {
        //通知观察者
        $this->notify();
    }
}

$observerEvent = new ObserverEvent();
$observerEvent->add(new Observer1());
$observerEvent->add(new Observer2());

echo '订单完成！'."<br>";
$observerEvent->trigger();
