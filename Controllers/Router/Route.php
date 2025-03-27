<?php

/**
 * This abstract class represents a route in the application.
 * It contains methods to handle GET and POST requests, as well as a method to retrieve a parameter from an array.
 *
 * @author Théo Cornu
 */
abstract class Route {
    /**
     * The parameters of the route.
     *
     * @var array
     */
    private $params;

    /**
     * The HTTP method of the route.
     *
     * @var string
     */
    private $method;

    /**
     * Creates a new Route instance.
     *
     * @param array  $params The parameters of the route.
     * @param string $method The HTTP method of the route.
     */
    public function __construct($params = [], $method = 'GET') {
        $this->params = $params;
        $this->method = $method;
    }

    /**
     * Executes the appropriate method for the given HTTP method.
     *
     * @param array  $params The parameters of the request.
     * @param string $method The HTTP method of the request.
     *
     * @return mixed The result of the executed method.
     */
    public function action($params = [], $method = 'GET') {
        if ($method === 'GET') {
            return $this->get($params);
        } 
        elseif ($method === 'POST') {
            return $this->post($params);
        }
    }

    /**
     * Retrieves a parameter from an array.
     *
     * @param array  $array      The array to retrieve the parameter from.
     * @param string $paramName  The name of the parameter to retrieve.
     * @param bool   $canBeEmpty Whether the parameter can be empty or not.
     *
     * @return mixed The value of the retrieved parameter.
     *
     * @throws Exception If the parameter is absent or empty and cannot be empty.
     */
    protected function getParam(array $array, string $paramName, bool $canBeEmpty = true) {
        if (isset($array[$paramName])) {
            if (!$canBeEmpty && empty($array[$paramName])) {
                throw new Exception("Paramètre '$paramName' vide");
            }
            return $array[$paramName];
        } else {
            throw new Exception("Paramètre '$paramName' absent");
        }
    }

    /**
     * Handles a GET request.
     *
     * @param array $params The parameters of the request.
     *
     * @return mixed The result of the GET request.
     */
    abstract protected function get($params = []);

    /**
     * Handles a POST request.
     *
     * @param array $params The parameters of the request.
     *
     * @return mixed The result of the POST request.
     */
    abstract protected function post($params = []);
}
