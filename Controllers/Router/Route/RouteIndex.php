<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteIndex
 * @package Controllers\Router\Route
 *
 * This class represents the index route.
 * 
 * @author Théo Cornu
 */
class RouteIndex extends Route {
    private MainController $controller;

    /**
     * RouteIndex constructor.
     *
     * @param MainController $controller The main controller.
     */
    public function __construct(MainController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Handles GET requests for the index route.
     *
     * @param array $params The route parameters.
     * @return mixed The response.
     */
    public function get($params = []) {
        return $this->controller->Index();
    }

    /**
     * Handles POST requests for the index route.
     *
     * @param array $params The route parameters.
     * @return mixed The response.
     */
    public function post($params = []) {
        return $this->controller->Index();
    }
    

    public function action($params = [], $method = 'POST') {
        return $this->controller->Index();
    }
}
