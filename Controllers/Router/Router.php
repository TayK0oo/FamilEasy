<?php
/**
 * Router class that handles routing of HTTP requests to appropriate controllers and actions.
 *
 * @author Théo Cornu
 */
foreach (glob("Controllers/*.php") as $filename) {
    require_once $filename;
};
require_once 'Controllers/Router/Route.php';
foreach (glob("Controllers/Router/Route/*.php") as $filename) {
    require_once $filename;
};


class Router {
    /**
     * @var array List of routes.
     */
    private array $routeList = [];

    /**
     * @var array List of controllers.
     */
    private array $ctrlList = [];

    /**
     * @var string Name of the action key in the GET data.
     */
    private string $action_key;

    /**
     * Constructor for the Router class.
     *
     * @param string $name_of_action_key Name of the action key in the GET data.
     */
    public function __construct($name_of_action_key = "action") {
        // Set the action key
        $this->action_key = $name_of_action_key;
        // Create the controller list
        $this->createControllerList();
        // Create the route list
        $this->createRouteList();
    }

    /**
     * Creates the list of controllers.
     */
    public function createControllerList() {
        // Create the controller list
        $this->ctrlList = ['MainController' => new MainController(), 
        'LoginController' => new LoginController(),
        'UserController' => new UserController(),
        'TaskController' => new TaskController(),
        'DashBoardController' => new DashBoardController(),
        'HomeController' => new MyHomeController(),
    
        'FollowUpController' => new FollowUpController()];
    }

    /**
     * Creates the list of routes.
     */
    public function createRouteList() {
        // Create the route list
        $this->routeList = ["Index" => new RouteIndex($this->ctrlList["MainController"]),
        "DashBoard" => new RouteDashBoard($this->ctrlList["MainController"]),
        "Search" => new RouteSearch($this->ctrlList["MainController"]),
        "Connection" => new RouteConnection($this->ctrlList["MainController"]),
        "Registration" => new RouteRegistration($this->ctrlList["MainController"]),
        "ConnectLogin" => new RouteConnectLogin($this->ctrlList["LoginController"]),
        "Disconnect" => new RouteDisconnect($this->ctrlList["LoginController"]),
        "DeleteLogin" => new RouteDeleteLogin($this->ctrlList["LoginController"]),
        "AddUser" => new RouteAddUser($this->ctrlList["UserController"]),
        "DeleteUser" => new RouteDeleteUser($this->ctrlList["UserController"]),
        "EditUser" => new RouteEditUser($this->ctrlList["UserController"]),
        "InfoDashBoard" => new RouteInfoDashBoard($this->ctrlList["DashBoardController"]),
        "Reference" => new RouteReference($this->ctrlList["MainController"]),
        "TaskRegistration" => new RouteTaskRegistration($this->ctrlList["TaskController"]),
        "TaskSupression" => new RouteTaskSupression($this->ctrlList["TaskController"]),
        "TaskModification" => new RouteTaskModification($this->ctrlList["TaskController"]),
        "FollowUp" => new RouteFollowUp($this->ctrlList["MainController"]),
        "InfoFollowUp" => new RouteInfoFollowUp($this->ctrlList["FollowUpController"]),
        "PrivacyPolicy" => new RoutePrivacyPolicy($this->ctrlList["MainController"]),
        "CookiePolicy" => new RouteCookiePolicy($this->ctrlList["MainController"]),
        "LegalNotice" => new RouteLegalNotice($this->ctrlList["MainController"]),
        "TermsConditions" => new RouteTermsConditions($this->ctrlList["MainController"]),
        "ExportPDF" => new RouteExportPDF($this->ctrlList["MainController"])
    ,
        "MyHome" => new RouteMyHome($this->ctrlList["MainController"]),
        "HomeRegistration" => new RouteHomeRegistration($this->ctrlList["HomeController"]),
        "MyHomeRegistration" => new RouteMyHomeRegistration($this->ctrlList["MainController"]),
        "MyHomeConnect" => new RouteMyHomeConnect($this->ctrlList["HomeController"]),
    ];
    }

    /**
     * Routes the HTTP request to the appropriate controller and action.
     *
     * @param array $get The GET data of the HTTP request.
     * @param array $post The POST data of the HTTP request.
     *
     * @throws Exception If no route is found for the action in the GET data.
     */
    public function routing($get, $post) {
        // Check if the action key is present in the GET data
        if (isset($get[$this->action_key])) {
            // Get the action from the GET data
            $action = $get[$this->action_key];

            // Get the route linked to the action    
            $route = $this->routeList[$action];

            // If no route is found, throw an exception
            if (!$route) {
                throw new Exception("Route not found for action: " . $action);
            }

            // Invoke the action method of the route with the appropriate HTTP method
            if (!empty($post)) {
                $route->action($post, 'POST');
            } else {
                $route->action('GET');
            }
        }
    }
}
