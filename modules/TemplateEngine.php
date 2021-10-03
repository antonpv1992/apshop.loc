<?php
namespace modules;

class TemplateEngine {

    public function __construct($template, $params, $layout)
    {
        
        if (is_array($params)) {
            extract($params);
        }
        ob_start();
        $file_view = PAGES . $layout . ".php";
        if (is_file($file_view)) {
            require $file_view;
        } else {
            return "ERORR!";
        }
        $content = ob_get_clean();
        include_once LAYOUTS . $template . ".php";
    }
}