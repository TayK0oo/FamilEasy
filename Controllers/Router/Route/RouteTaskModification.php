<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteTaskModification
 * @package Controllers\Router\Route
 * @author Théo Cornu
 * 
 */

 class RouteTaskModification extends Route {
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
        return $this->controller->AddTask();
    }

    /**
     * Handle POST request for DashBoard route
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->AddTask();
    }

    /**
     * Handle action request for DashBoard route
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'POST') {
        return $this->controller->AddTask();
    }
 }