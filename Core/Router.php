<?php

class Router {

    // routing table
    private $routes;

    /*
     * add route to routing table
     * @param string $route
     * @param array $param
     */
    public function add($route, $param)
    {
        $this->routes[$route] = $param;
    }

    // get routing table
    public function getRoutes()
    {
        return $this->routes;
    }
}
