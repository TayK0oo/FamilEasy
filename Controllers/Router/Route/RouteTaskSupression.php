<?php
require_once 'Controllers/Router/Route.php';

/**
 * Class RouteTaskTaskSuppression
 * @package Controllers\Router\Route
 * @author Théo Cornu
 * 
 */

 class RouteTaskSupression extends Route {
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
        return $this->controller->DeleteTask();
    }

    /**
     * Handle POST request for DashBoard route
     * @param array $params
     * @return mixed
     */
    public function post($params = []) {
        return $this->controller->DeleteTask();
    }

    /**
     * Handle action request for DashBoard route
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public function action($params = [], $method = 'GET') {
        return $this->controller->DeleteTask();
    }
 }