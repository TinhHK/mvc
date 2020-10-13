<?php

class Router {

    /* Routing table
     * @var array
     */
    private $route;

    /* params contain controller and action of route
     * @var array
     */
    private $param;

    /* convert query string to regex, then add to routing table
     * @param $route string
     * @param $parma array
     * @return void
     */
    public function add($route, $param = [])
    {
        // add escape sequence to /
        $route = preg_replace('/\//', '\/', $route);
        // convert variable
        $route = preg_replace('/\{([a-z]+)\}/', '(?<\1>[a-z-]+)', $route);
        // convert id variable {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?<\1>\2)', $route);
        // add start and end delimiters, and case insensitive flag
        $route = '/^'.$route.'$/i';
        $this->route[$route] = $param;

    }


    /* match url from route to regex, if existing param, it will be overridden
     * @param $url string
     * @return boolean
     */
    public function match(string $url)
    {
        foreach($this->route as $route => $param) {
            if(preg_match($route, $url, $matches)) {
                foreach ($matches as $name => $match) {
                    if(is_string($name)) {
                        $param[$name] = $match;
                    }
                }
                $this->param = $param;
                return true;
            }
        }
        return false;

    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getParam()
    {
        return $this->param;
    }
}
