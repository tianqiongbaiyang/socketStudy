<?php

declare(strict_types=1);

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');
Router::addRoute(['GET','POST','HEAD'], '/userService/register', 'App\Service\UserService@register');

Router::get('/favicon.ico', function () {
    return '';
});
