<?php

namespace Framework\Core;

use Exception;

class View
{
    private $layout;
    private $template;

    public function __construct($layout = LAYOUT, $template = "home")
    {
        $this->layout = $layout;
        $this->template = $template;
    }

    public function render($data, $template = "home")
    {
        if (is_array($data)) {
            extract($data);
        }
        $this->template = !$template ? $this->template : $template;
        $fileView = TEMPLATES . DS . $template . ".php";
        ob_start();
        if (is_file($fileView)) {
            require_once $fileView;
        } else {
            throw new Exception("Not found template", 404);
        }
        $content = ob_get_clean();
        $fileLayout = LAYOUTS . DS . $this->layout . ".php";
        if (is_file($fileLayout)) {
            require_once $fileLayout;
        } else {
            throw new Exception("Not found layout", 404);
        }
    }
}