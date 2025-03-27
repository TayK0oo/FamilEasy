<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteCookiePolicy
 * @package Controllers\Router\Route
 *
 * This class represents the Terms & Conditions route.
 * 
 * @author Théo Deguin
 */

 class RouteCookiePolicy extends Route {
    private MainController $controller;

    /**
     * RouteCookiePolicy constructor.
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
        return $this->controller->CookiePolicy();
    }

    /**
     * Handles POST requests for the Reference route.
     *
     * @param array $params The route parameters.
     * @return mixed The response.
     */
    public function post($params = []) {
        return $this->controller->CookiePolicy();
    }
    

    public function action($params = [], $method = 'POST') {
        return $this->controller->CookiePolicy();
    }
}