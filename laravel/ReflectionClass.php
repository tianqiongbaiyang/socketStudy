<?php
// 获取User的reflectionClass对象
$reflector = new ReflectionClass(User::class);
// 拿到User的构造函数
$constructor = $reflector->getConstructor();
// 拿到User的构造函数的所有依赖参数
$dependencies = $constructor->getParameters();
// 创建user对象
$user = $reflector->newInstance();
// 创建user对象，需要传递参数的
$user = $reflector->newInstanceArgs($dependencies);
