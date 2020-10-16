<?php

namespace Core;

Abstract class View {

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
            throw new \Exception("No $view found");
        }
    }

    /*
     * render a twig template
     *
     * @param string $template
     * @param array $param
     * @return void
     */
    public static function renderTemplate($template, $param = [])
    {
        static $twig = null;
        if($twig === null){
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig\Environment($loader);
        }
        echo $twig->render($template, $param);
    }
}
