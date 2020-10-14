<?php

namespace Core;

class View {

    /* Render a view file
     * @param string $view
     * @return void
     */
    public static function render($view, $param = [])
    {
        extract($param, EXTR_SKIP);
        $root = dirname(__DIR__);
        $file = $root.'/App/Views/'.$view;
        if(is_readable($file)){
            require "$file";
        } else {
            echo "No $view found";
        }
    }
}
