<?php

class Router {

    // params contain controller and action of route
    private $params;


    public function match(string $url)
    {
        $pattern = "/^(?<controller>[a-z-]+)\/(?<action>[a-z-]+)$/";
        if(preg_match($pattern, $url, $matches)) {
            foreach ( $matches as $key => $val) {
                if(is_string($key)) {
                    $this->params[$key] = $val;
                }
            }
            return true;
        }
        return false;

    }

    public function getParam()
    {
        return $this->params;
    }
}
