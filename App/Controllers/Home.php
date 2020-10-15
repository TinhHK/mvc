<?php

namespace App\Controllers;

use Core\View;

class Home extends \Core\Controller {

    public function indexAction()
    {
        View::renderTemplate('Home/index.html', [
            'name' => 'Mrktinh',
            'colors' => ['blue, red, yellow']
        ]);
    }

    public function before()
    {
    }

    public function after()
    {
    }
}
