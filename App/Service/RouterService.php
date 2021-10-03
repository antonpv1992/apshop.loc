<?php

namespace App\Service;

trait RouterService 
{

    private $method = 'get';
    private $params = [];
    private $notFound = [
        "controller" => "BreakController",
        "action" => "notFound"
    ];

    private function getCurrentRoute($routes, $route)
    {
        foreach ($routes as $key => $value) {
            if (is_string($key)) {
                $route[$key] = $value;
            }
        }
        if (!isset($route["action"])) {
            $this->route = $this->notFound;
            return $this->route;
        }
        $route["method"] = $this->method;
        $route["params"] = $this->params;
        if(isset($route["category"])){
            $this->params["category"] = $route["category"];
        }
        if(isset($route["alias"])){
            $this->params["alias"] = $route["alias"];
        }
        $route["controller"] = $this->upperCamelCase($route["controller"]);
        return $route;
    }

    private function getMethod()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        switch($method) {
            case "GET":
                $this->method = "get";
                $this->params = $_GET;
                break;
            case "POST":
                $this->method = "post";
                $this->params = $_POST;
                break;
            case "PUT":
                $this->method = "put";
                $this->params = $_POST;
                break;
            case "PATCH":
                $this->method = "patch";
                $this->params = $_POST;
                break;
            case "DELETE":
                $this->method = "delete";
                $this->params = $_POST;
                break;
            default:
                $this->method = "other";
                $this->params = $_REQUEST;
                break;
        }
        return $this->method;
    }

    private function redirect(bool|string $http = false)
    {
        if ($http) {
            $redirect = $http;
        } else {
            $redirect = $_SERVER['HTTP_REFERER'] ?? '/';
        }
        header("Location: $redirect");
        exit();
    }
}