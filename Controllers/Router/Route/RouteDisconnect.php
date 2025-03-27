<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteDisconnect
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteDisconnect extends Route {
    private LoginController $controller;

    /**
     * RouteDisconnect constructor.
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
        return $this->controller->Disconnect();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->Disconnect();
    }

    /**
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'Get') {
        return $this->controller->Disconnect();
    }
}
