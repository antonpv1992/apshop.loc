<?php

require_once dirname(__DIR__) . "/Framework/Configs/constants.php";
require_once "../vendor/autoload.php";
$routes = require_once CONFIGS . DS . "routes.php";

use App\Controller\BreakController;
use Framework\Router\Router;
use Framework\Session\Session;

use MyLogger\MyLogger as Logger;

new Session();
$url = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/');
$router = new Router($routes);
try {
    $router->run($url);
    $classController = "App\Controller\\" . $router->getController() . "Controller";
    if (class_exists($classController)) {
        $objectController = new $classController();
        $classAction = $router->getAction();
        if (method_exists($objectController, $classAction)) {
            $pageData = $objectController->$classAction($router->getRequest());
            $objectController->set($pageData);
            $objectController->getTemplate();
        } else {
            throw new Exception("Not found action", 404);
        }
    } else {
        throw new Exception("Not found controller", 404);
    }
} catch (Exception $e) {
    $objectController = new BreakController();
    $objectController->notFound($e->getMessage());
    $logger = new Logger('log/exceptions.log', 'MyLog');
    $logger->exception($e->getMessage());
}