<?php

interface Log
{
    public function write();
}

class FileLog implements Log
{
    public function write()
    {
        echo 'file log write...' . "\n";
    }
}

class DatabaseLog implements Log
{
    public function write()
    {
        echo 'database log write...' . "\n";
    }
}

/*class User
{
    protected $fileLog;

    public function __construct()
    {
        $this->fileLog = new FileLog();
    }

    public function login()
    {
        echo 'login success...';
        $this->fileLog->write();
    }
}

$user = new User();
$user->login();*/

/*class User
{
    protected $log;

    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    public function login()
    {
        echo 'login success...';
        $this->log->write();
    }
}

$user = new User(new DatabaseLog());
$user->login();*/

/*function make($concrete)
{
    $reflector = new ReflectionClass($concrete);
    $constructor = $reflector->getConstructor();
    $dependencies = $constructor->getParameters();
    return $reflector->newInstanceArgs($dependencies);
}

$user = make('User');
$user->login();*/

// 注意我们这里需要修改一下User的构造函数，如果不去修改。反射是不能动态创建接口的，那如果非要用接口该怎么处理呢？下一节我们讲Ioc容器的时候会去解决。
class User
{
    protected $log;

    public function __construct(FileLog $log)
    {
        $this->log = $log;
    }

    public function login()
    {
        echo 'login success...' . "\n";
        $this->log->write();
    }
}

function make($concrete)
{
    $reflector = new ReflectionClass($concrete);
    $constructor = $reflector->getConstructor();

    // 为什么这样写的? 主要是递归。比如创建FileLog不需要传入参数。
    if (is_null($constructor)) {
        return $reflector->newInstance();
    } else {
        // 构造函数依赖的参数
        $dependencies = $constructor->getParameters();

        // 根据参数返回实例，如FileLog
        $instances = getDependencies($dependencies);
        return $reflector->newInstanceArgs($instances);
    }
}

function getDependencies($paramteres)
{
    $dependencies = [];
    foreach ($paramteres as $paramter) {

        $dependencies[] = make($paramter->getClass()->name);
    }
    return $dependencies;
}

$user = make('User');
$user->login();