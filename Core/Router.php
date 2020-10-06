<?php

class Router {

    // routing table
    private $routes;
    // params contain controller and action of route
    private $params;

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

    public function match(string $url)
    {
        foreach($this->routes as $route => $param) {
            if($route === $url) {
                $this->params = $param;
                return true;
            }
        }
        return false;
    }

    public function getParam()
    {
        return $this->params;
    }
}
