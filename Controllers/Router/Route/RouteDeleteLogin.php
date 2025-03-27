<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteDeleteLogin
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteDeleteLogin extends Route {
    private LoginController $controller;

    /**
     * RouteDeleteLogin constructor.
     * @param LoginController $controller
     */
    public function __construct(LoginController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->Delete();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->Delete();
    }

    /**
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'POST') {
        return $this->controller->Delete();
    }
}
