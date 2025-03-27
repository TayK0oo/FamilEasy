<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteAddLogin
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteConnectLogin extends Route {
    private LoginController $controller;

    /**
     * RouteAddLogin constructor.
     * @param LoginController $controller
     */
    public function __construct(LoginController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Get method for RouteAddLogin
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->Connect();
    }

    /**
     * Post method for RouteAddLogin
     * @param array $params
     */
    public function post($params = []) {
        return $this->controller->Connect();
    }

    /**
     * Action method for RouteAddLogin
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'GET') {
        return $this->controller->Connect();
    }
}
