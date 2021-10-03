<?php

spl_autoload_register(
    function ($class) {
        $file = ROOT . DS . str_replace('\\', DS, $class) . '.php';
        if (is_file($file)) {
            require_once $file;
        }
    }
);