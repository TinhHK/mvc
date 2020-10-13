<?php

require '../Core/Router.php';
require '../App/Controllers/Posts.php';

$router = new Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}', ['controller' => 'add', 'action' => 'sad']);
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');

$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);

//if($router->match($url)){
//    var_dump($router->getParam());
//} else {
//    echo "Not found $url";
//}
