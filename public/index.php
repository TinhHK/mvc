<?php

require '../Core/Router.php';

$router = new Router();

//$router->add('', ['Controller' => 'Home', 'Action' => 'index']);
//$router->add('posts', ['Controller' => 'Posts', 'Action' => 'index']);
//$router->add('posts/new', ['Controller' => 'Posts', 'Action' => 'new']);

$url = $_SERVER['QUERY_STRING'];

if($router->match($url)){
    var_dump($router->getParam());
} else {
    echo "Not found $url";
}
