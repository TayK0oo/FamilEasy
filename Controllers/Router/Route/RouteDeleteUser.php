<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteDeleteUser
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteDeleteUser extends Route {
    private UserController $controller;

    /**
     * RouteDeleteUser constructor.
     * @param UserController $controller
     */
    public function __construct(UserController $controller) {
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
