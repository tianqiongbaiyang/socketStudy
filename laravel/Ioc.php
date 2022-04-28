<?php
//实例化ioc容器
/*$ioc = new Ioc();
$ioc->bind('Log', 'FileLog');
$ioc->bind('user', "User");
$user = $ioc->make('user');
$user->login();*/

interface Log
{
    public function write();
}

// 文件记录日志
class FileLog implements Log{
    public function write(){
        echo 'file log write...'."\n";
    }
}

// 数据库记录日志
class DatabaseLog implements Log
{
    public function write(){
        echo 'database log write...'."\n";
    }
}

class User
{
    protected $log;
    public function __construct(Log $log)
    {
        $this->log=$log;
    }
    public function login()
    {
        // 登录成功，记录登录日志
        echo 'login success...'."\n";
        $this->log->write();
    }
}

class Ioc
{
    public $binding=[];
    public function bind($abstract,$concrete)
    {
        //这里为什么要返回一个closure呢？因为bind的时候还不需要创建User对象，所以采用closure等make的时候再创建FileLog;
        $this->binding[$abstract]['concrete']=function($ioc) use ($concrete){
          return $ioc->build($concrete);
        };
    }

    public function make($abstract)
    {
        // 根据key获取binding的值
        $concrete = $this->binding[$abstract]['concrete'];
        return $concrete($this);
    }

    // 创建对象
    public function build($concrete){
        $reflector=new ReflectionClass($concrete);
        $constructor = $reflector->getConstructor();
        if(is_null($constructor)){
            return $reflector->newInstance();
        }else{
            $dependencies = $constructor->getParameters();
            $instances = $this->getDependencies($dependencies);
            return $reflector->newInstanceArgs($instances);
        }
    }

    // 获取参数的依赖
    protected function getDependencies($paramters)
    {
        $dependencies=[];
        foreach($paramters as $paramter){
            $dependencies[] = $this->make($paramter->getClass()->name);
        }
        return $dependencies;
    }
}

//实例化IoC容器
/*$ioc=new Ioc();
$ioc->bind('Log','FileLog');
$ioc->bind('user',"User");
$user=$ioc->make('user');
$user->login();*/

class UserFacade
{
    // 维护Ioc容器
    protected static $ioc;

    //后期静态绑定，static替换为实际调用的类
    public static function setFacadeIoc($ioc)
    {
        static::$ioc = $ioc;
    }

    // 返回User在Ioc中的bind的key
    protected static function getFacadeAccessor()
    {
        return 'user';
    }

    // php 魔术方法，当静态方法被调用时会被触发（调用不可访问方法）
    public static function __callStatic($method, $args)
    {
        $instance = static::$ioc->make('user');
        return $instance->$method(...$args);
    }

}

//实例化IoC容器
$ioc = new Ioc();
//Log必须大写，因为User依赖的类型提示类是大写的
$ioc->bind('Log','FileLog');
$ioc->bind('user','User');

//注入ioc容器
UserFacade::setFacadeIoc($ioc);
//直接调用方法
UserFacade::login();