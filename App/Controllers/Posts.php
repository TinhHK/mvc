<?php

namespace App\Controllers;

class Posts extends \Core\Controller {

    public function indexAction()
    {
        echo "Method index from Posts controller";
    }

    public function addNewAction()
    {
        echo "Method addNew from Posts controller";
    }

    public function editAction() {
        var_dump($this->route_params);
    }
}
