<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteTaskRegistration
 * @package Controllers\Router\Route
 * @author Théo Cornu
 * 
 */

 class RouteTaskRegistration extends Route {
    private TaskController $controller;


    /**
     * RouteTaskRegistration constructor
     * @param TaskController $controller
    */
    public function __construct(TaskController $controller) {
        parent::__construct();

        $this->controller = $controller;
    }

    /**
     * Handle GET request for DashBoard route
     * @param array $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->controller->addTask();
    }

    /**
     * Handle POST request for DashBoard route
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->addTask();
    }

    /**
     * Handle action request for DashBoard route
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'GET') {
        return $this->controller->addTask();
    }
 }