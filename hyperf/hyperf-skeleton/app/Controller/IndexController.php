<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use App\Service\UserServiceInterface;

class IndexController extends AbstractController
{
//    private $userService;

//    /**
//     * 通过 `#[Inject]` 注解注入由 `@var` 注解声明的属性类型对象
//     * @var UserService
//     * @inject
//     */
//    #[Inject]
//    /**
//     * 通过 `#[Inject]` 注解注入由 `@var` 注解声明的属性类型对象
//     * 当 UserService 不存在于 DI 容器内或不可创建时，则注入 null
//     * @var UserService
//     * @inject("required: false")
//     */
    /**
     * @var UserServiceInterface
     * @inject
     */
    private $userService;

    // 通过在构造函数的参数上声明参数类型完成自动注入
/*    public function __construct(UserService $userService){
        $this->userService = $userService;
    }*/

    // 通过设置参数为 nullable，表明该参数为一个可选参数
/*    public function __construct(?UserService $userService)
    {
        $this->userService = $userService;
    }*/

    public function index()
    {
//        $user = $this->request->input('user', 'Hyperf');
//        $method = $this->request->getMethod();
//
//        return [
//            'method' => $method,
//            'message' => "Hello {$user}.",
//        ];

//        return $this->userService->getInfoById(3);

/*        if ($this->userService instanceof UserService) {
            // 仅值存在时 $userService 可用
            return $this->userService->getInfoById(8);
        }
        return null;*/

//        return $this->userService->getInfoById(5);

/*        if ($this->userService instanceof UserService) {
            // 仅值存在时 $userService 可用
            return $this->userService->getInfoById(10);
        }
        return null;*/

        return $this->userService->getInfoById(4);

    }
}
