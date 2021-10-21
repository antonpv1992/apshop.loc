<?php

namespace Framework\Router;

use App\Service\RouterService;
use App\Service\StringService;
use Exception;

class Router
{

    use RouterService, StringService;

    private $routes = [];
    private $route = [];

    public function __construct(array $routes = [])
    {
        foreach($routes as $regexp => $route) {
            $this->routes[$regexp] = $route;
        }
    }

    public function run($url)
    {
        $url .= "@" . $this->getMethod();
        if (!$this->matchRoute($url)) {
            throw new Exception("Bad Route Exception", 404);
        }
    }

    public function matchRoute(string $url): bool
    {
        foreach ($this->routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                $this->route = $this->getCurrentRoute($matches, $route);
                return true;
            }
        }
        return false;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getController()
    {
        return $this->route['controller'];
    }

    public function getAction()
    {
        return $this->route['action'];
    }

    public function getRequest()
    {
        return $this->params;
    }

}