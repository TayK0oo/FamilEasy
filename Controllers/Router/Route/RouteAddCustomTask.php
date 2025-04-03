<?php


require_once 'Controllers/Router/Route.php';

/**
 * Class RouteAddCustomTask
 * @package Controllers\Router\Route
 */
class RouteAddCustomTask extends Route {
    private TaskController $controller;

    public function __construct(TaskController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    public function get($params = []) {
        return $this->controller->AddCustomTask();
    }

    public function post($params = []) {
        return $this->controller->AddCustomTask();
    }

    public function action($params = [], $method = 'GET') {
        return $this->controller->AddCustomTask();
    }
}
