<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteSearch
 * @package Controllers\Router\Route
 * @author Théo Cornu
 */
class RouteSearch extends Route {
    private MainController $controller;

    /**
     * RouteSearch constructor.
     * @param MainController $controller
     */
    public function __construct(MainController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Handle GET request
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->Search();
    }

    /**
     * Handle POST request
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->Search();
    }

    /**
     * Handle action request
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'POST') {
        return $this->controller->Search();
    }
}
