<?php

    $providers = [
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class
    ];

    // 随便打开一个类比如CacheServiceProvider，这个服务提供者都是通过调用register方法注册到ioc容器中，
    //其中的app就是Ioc容器。singleton可以理解成我们的上面例子中的bind方法。只不过这里singleton指的是单例模式。
    class CacheServiceProvider{
        public function register()
        {
            $this->app->singleton('cache',function($app){
                return new CacheManager($app);
            });

            $this->app->singleton('cache.store',function($app){
                return $app['cache']->driver();
            });

            $this->app->singleton('memcached.connector',function(){
                return new MemcachedConnector;
            });
        }
    }