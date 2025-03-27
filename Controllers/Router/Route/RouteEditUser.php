<?php
require_once 'Controllers/Router/Route.php';

/**
 * Represents a route for editing a User.
 *
 * @author Théo Cornu
 */
class RouteEditUser extends Route {
    private UserController $controller;

    /**
     * Initializes a new instance of the RouteEditUser class.
     *
     * @param UserController $controller The User controller.
     */
    public function __construct(UserController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Handles GET requests for the route.
     *
     * @param array $params The route parameters.
     * @return mixed The result of the update operation.
     */
    public function get($params = []) {
        return $this->controller->Add();
    }

    /**
     * Handles POST requests for the route.
     *
     * @param array $params The route parameters.
     * @return mixed The result of the update operation.
     */
    public function post($params = []) {
        return $this->controller->Add();
    }

    /**
     * Handles requests for the route.
     *
     * @param array $params The route parameters.
     * @param string $method The request method.
     * @return mixed The result of the update operation.
     */
    public function action($params = [], $method = 'POST') {
        return $this->controller->Add();
    }
}
