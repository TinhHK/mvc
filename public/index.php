<?php

require_once '../Core/Router.php';

$router = new Router();

$router->add('/', ['Controller' => 'Home', 'Action' => 'index']);
$router->add('posts', ['Controller' => 'Posts', 'Action' => 'index']);
$router->add('posts/new', ['Controller' => 'Posts', 'Action' => 'new']);

var_dump($router->getRoutes());