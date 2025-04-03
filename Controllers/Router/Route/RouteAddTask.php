<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteAddTask
 * @package Controllers\Router\Route
 * @author Laszlo Duszynski
 */
class RouteAddTask extends Route {
    private MainController $controller;

    /**
     * RouteAddTask constructor.
     * @param MainController $controller
     */
    public function __construct(MainController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Get method for RouteAddTask
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->AddTask();
    }

    /**
     * Post method for RouteAddTask
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->AddTask();
    }

    /**
     * Action method for RouteAddTask
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'GET') {
        return $this->controller->AddTask();
    }
}