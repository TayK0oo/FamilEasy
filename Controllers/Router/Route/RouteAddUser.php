<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteAddUser
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteAddUser extends Route {
    /**
     * @var UserController
     */
    private UserController $controller;

    /**
     * RouteAddUser constructor.
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
        return $this->controller->Add();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->Add();
    }

    /**
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'POST') {
        return $this->controller->Add();
    }
}
