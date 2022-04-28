<?php
interface Middleware {
    public static function handle(Closure $next);
}

class VerifyCsrfToken implements Middleware {
    public static function handle(Closure $next)
    {
        echo "验证csrf Token <br>";
        $next();
    }
}

class VerifyAuth implements Middleware {
    public static function handle(Closure $next)
    {
        echo "验证是否登陆 <br>";
        $next();
    }
}

class SetCookie implements Middleware {
    public static function handle(Closure $next)
    {
        $next();
        echo '设置cookie信息！ '."<br>";
    }
}

/*function call_middleware(){
    SetCookie::handle(function(){
        VerifyAuth::handle(function(){
            $handle = function(){
                echo '当前要执行的程序！'."<br>";
            };
            VerifyCsrfToken::handle($handle);
        });
    });
}

call_middleware();*/

$handle = function(){
    echo '当前要执行的程序！'."<br>";
};

$pipe_arr = [
    'VerifyCsrfToken',
    'VerifyAuth',
    'SetCookie'
];

//array_reduce() 用回调函数迭代处理数组并返回迭代值。
$callback = array_reduce($pipe_arr, function($stack,$pipe){
    return function() use ($stack,$pipe){
        return $pipe::handle($stack);
    };
},$handle);

//function() use ($handle){
//  SetCookie::handle(
//      function() use ($handle){
//          VerifyAuth::handle(
//              function() use($handle){
//                  VerifyCsrfToken::handle($handle);
//              });
//      }
//  );
//};

//call_user_func() 调用回调函数
call_user_func($callback);



