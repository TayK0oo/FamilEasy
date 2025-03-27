<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteMyHomeRegistration
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteMyHomeRegistration extends Route {
    private MainController $controller;

    /**
     * RouteMyHome constructor.
     * @param MainController $controller
     */
    public function __construct(MainController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Handle GET request for MyHome route
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->MyHomeRegistration();
    }

    /**
     * Handle POST request for MyHome route
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->MyHomeRegistration();
    }

    /**
     * Handle action request for MyHome route
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'GET') {
        return $this->controller->MyHomeRegistration();
    }
}
