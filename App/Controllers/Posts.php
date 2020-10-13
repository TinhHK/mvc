<?php

namespace App\Controllers;

class Posts extends \Core\Controller {

    public function index()
    {
        echo "Method index from Posts controller";
    }

    public function addNew()
    {
        echo "Method addNew from Posts controller";
    }

    public function edit() {
        var_dump($this->route_params);
    }
}
