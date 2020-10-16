<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

error_reporting(E_ALL);
// Error and Exception handling
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}', ['controller' => 'add', 'action' => 'sad']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('{controller}/{id:\d+}/{action}');

$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);

