<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteReference
 * @package Controllers\Router\Route
 *
 * This class represents the Reference route.
 * 
 * @author Théo Cornu
 */
class RouteReference extends Route {
    private MainController $controller;

    /**
     * RouteReference constructor.
     *
     * @param MainController $controller The main controller.
     */
    public function __construct(MainController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Handles GET requests for the Reference route.
     *
     * @param array $params The route parameters.
     * @return mixed The response.
     */
    public function get($params = []) {
        return $this->controller->Reference();
    }

    /**
     * Handles POST requests for the Reference route.
     *
     * @param array $params The route parameters.
     * @return mixed The response.
     */
    public function post($params = []) {
        return $this->controller->Reference();
    }
    

    public function action($params = [], $method = 'POST') {
        return $this->controller->Reference();
    }
}
