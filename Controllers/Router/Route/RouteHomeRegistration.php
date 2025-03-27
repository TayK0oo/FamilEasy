<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteHomeRegistration
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteHomeRegistration extends Route {
    private MyHomeController $controller;

    /**
     * RouteAddLogin constructor.
     * @param MyHomeController $controller
     */
    public function __construct(MyHomeController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Get method for RouteHomeRegistration
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->AddHome();
    }

    /**
     * Post method for RouteHomeRegistration
     * @param array $params
     */
    public function post($params = []) {
        return $this->controller->AddHome();
    }

    /**
     * Action method for RouteHomeRegistration
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'GET') {
        return $this->controller->AddHome();
    }
}
