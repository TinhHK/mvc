<?php

namespace Core;

class View {

    /* Render a view file
     * @param string $view
     * @return void
     */
    public static function render($view)
    {
        $root = dirname(__DIR__);
        $file = $root.'/App/Views/'.$view;
        if(is_readable($file)){
            require "$file";
        } else {
            echo "No $view found";
        }
    }
}
