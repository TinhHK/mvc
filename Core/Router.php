<?php
namespace Core;

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

    /* dispatch the route, create object calling method
     * @param string $url
     * @return void
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryString($url);
        if($this->match($url)){
            $controller = $this->param['controller'];
            $controller = 'App\Controllers\\'.$this->convertToStudlyCaps($controller);
            if(class_exists($controller)){
                $class = new $controller($this->param);
                $action = $this->param['action'];
                $action = $this->convertToCamelCase($action);
                if(is_callable([$class, $action])) {
                    $class->$action();
                } else {
                    echo "Method $action is not found";
                }
            } else {
                echo "Class $controller is not found";
            }
        } else {
            echo "$url not found";
        }
    }

    /* remove ?key=val&key2=val2...
     * @param string $url
     * @return string
     */
    private function removeQueryString($url)
    {
        if($url !== '') {
            $parts = explode('&', $url, 2);
            if(strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return $url;
    }

    private function convertToStudlyCaps($string)
    {
        return str_replace('-', '', ucwords($string, '-'));
    }

    private function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
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
