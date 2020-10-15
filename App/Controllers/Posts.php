<?php

namespace App\Controllers;
use Core\View;

class Posts extends \Core\Controller {

    public function indexAction()
    {
        View::renderTemplate('Posts/index.html');
    }

    public function addNewAction()
    {
        echo "Method addNew from Posts controller";
    }

    public function editAction() {
        var_dump($this->route_params);
    }
}
