<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteConnection
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteConnection extends Route {
    private MainController $controller;

    /**
     * RouteConnection constructor.
     * @param MainController $controller
     */
    public function __construct(MainController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Get method for RouteConnection
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->Connection();
    }

    /**
     * Post method for RouteConnection
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->Connection();
    }

    /**
     * Action method for RouteConnection
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'GET') {
        return $this->controller->Connection();
    }
}
