<?php
const DS = DIRECTORY_SEPARATOR;
define("ROOT", substr(str_replace("\\", DS, __DIR__), 0, strrpos(str_replace("\\", DS, __DIR__), DS)) . DS);
const COMPONENTS = ROOT . "views" . DS . "components" . DS;
const LAYOUTS = ROOT . "views" . DS . "layout" . DS;
const PAGES = ROOT . "views" . DS . "pages" . DS;
spl_autoload_register(
function ($class) {
    $file = ROOT . str_replace("\\", DS, $class) . ".php";
    if (is_file($file)) {
        require_once $file;
    }
}
);