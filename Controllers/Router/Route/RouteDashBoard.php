<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteDashBoard
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteDashBoard extends Route {
    private MainController $controller;

    /**
     * RouteDashBoard constructor.
     * @param MainController $controller
     */
    public function __construct(MainController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Handle GET request for DashBoard route
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->DashBoard();
    }

    /**
     * Handle POST request for DashBoard route
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->DashBoard();
    }

    /**
     * Handle action request for DashBoard route
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'GET') {
        return $this->controller->DashBoard();
    }
}
