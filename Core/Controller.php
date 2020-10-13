<?php

namespace Core;

Abstract class Controller {

    protected $route_params = [];

    public function __construct($route_params) {
        $this->route_params = $route_params;
    }
}
