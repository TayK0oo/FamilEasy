<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteRegistration
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteRegistration extends Route {
    private MainController $controller;

    /**
     * RouteRegistration constructor.
     * @param MainController $controller
     */
    public function __construct(MainController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Handle GET request for registration route
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->Registration();
    }

    /**
     * Handle POST request for registration route
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->Registration();
    }

    /**
     * Handle action request for registration route
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'GET') {
        return $this->controller->Registration();
    }
}
