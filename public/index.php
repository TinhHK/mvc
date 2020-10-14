<?php

spl_autoload_register(function($class){
    $file = dirname(__DIR__).'/'.$class.'.php';
    $file = str_replace('\\', '/', $file);
    if(file_exists($file)){
        require "$file";
    }
});

$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}', ['controller' => 'add', 'action' => 'sad']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('{controller}/{id:\d+}/{action}');

$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);

