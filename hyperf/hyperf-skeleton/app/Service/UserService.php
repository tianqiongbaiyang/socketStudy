<?php
namespace App\Service;

use Hyperf\Di\Annotation\Inject;
use Psr\EventDispatcher\EventDispatcherInterface;
use App\Event\UserRegistered;

class UserService implements UserServiceInterface
{
    /**
     * @var EventDispatcherInterface
     * @inject
     */
    private $eventDispatcher;

    public function register()
    {
        // 完成账号注册的逻辑
        // 这里 dispatch(object $event) 会逐个运行监听该事件的监听器
        $result = $this->eventDispatcher->dispatch(new UserRegistered('test'));
        return [
            'msg' => 'success',
            'result' => $result
        ];
    }

    public function getInfoById(int $id)
    {
        return $id+2;
    }
}