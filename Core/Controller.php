<?php

namespace Core;

Abstract class Controller {

    protected $route_params = [];

    public function __construct($route_params) {
        $this->route_params = $route_params;
    }

    public function __call($method, $param)
    {
        $action = $method.'Action';
        if(method_exists($this, $action)){
            if($this->before() !== false){
                call_user_func_array([$this, $action], $param);
                $this->after();
            }
        } else {
            throw new \Exception("Method $action not found in controller ".get_class($this));
        }

    }

    protected function before(){}
    protected function after(){}
}
