<?php

namespace App\Controllers;
use Core\View;
use App\Models\Post;

class Posts extends \Core\Controller {

    public function indexAction()
    {
        $post = Post::getAll();
        View::renderTemplate('Posts/inde.html', [
            'posts' => $post
        ]);
    }

    public function addNewAction()
    {
        echo "Method addNew from Posts controller";
    }

    public function editAction() {
        var_dump($this->route_params);
    }
}
