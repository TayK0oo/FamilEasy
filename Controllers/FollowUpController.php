<?php
    require_once 'Views/View.php';
    require_once 'Controllers/MainController.php';
    require_once 'Models/DashBoardManager.php';
    require_once 'Models/UserManager.php';
    require_once 'Models/TaskManager.php';
    require_once 'Models/LoginManager.php';

    /**
     * Class FollowUpController
     * @author Enzo
     */
    class FollowUpController {
        private $mainController;
        private $taskManager;
        private $userManager;
        private $loginManager;
        private $dashboardManager;
        private $dashboard;

        public function __construct() {
            $this->mainController = new MainController();
            $this->taskManager = new TaskManager();
            $this->userManager = new UserManager();
            $this->loginManager = new LoginManager();
            $this->dashboardManager = new DashBoardManager();
            $this->dashboard = new DashBoard();
        }

        /**
         * Display the follow up page
         * @author Enzo
         */
        public function InfoFollowUp() {
            // Check if the user is connected
            if(!isset($_SESSION['IdLogin'])) {
                // Redirect to the main page with an error message
                $this->mainController->Index("You must be connected to access to this page");
            }
            else {
                // Update the Follow up  
                $this->UpdateDashboard();

                // Retrieve the tasks
                $tasks = $this->taskManager->GetAllByDashBoard($this->dashboard->GetId());
                // Send to the session the list of tasks
                $_SESSION['tasks'] = $tasks;

                //récupere (temps pour le foyer, et le pourcentage de la personne dans cette durée)
                $times = $this->userManager->GetTotalDurationByTask($this->userManager->GetIdMyHomeByIdUser($this->dashboard->GetIdUser()));
                // Send to the session the time
                $_SESSION['FoyerTimes'] = $times;

                // Display the view of Follow Up
                $this->mainController->FollowUp();
            }
        }

        /**
         * Update a dashboard
         * @author Théo
         */
        private function UpdateDashboard() {
            // Set properties
            $this->PopulateDashboard();

            // Update the dashboard in the database
            $this->dashboardManager->UpdateDashboard($this->dashboard);

        }

        /**
         * Set the properties of the DashBoard object
         * @author Théo
         */
        private function PopulateDashboard() {
            // Get User Id, Username
            $idUser = $this->userManager->GetIdUserByLoginId(intval($_SESSION['IdLogin']));
            $username = $this->loginManager->GetUsernameByIdLogin(intval($_SESSION['IdLogin']));
            
            // Set Id, Username, IdUser
            $this->dashboard->SetId($this->userManager->GetIdDashboardByUserId($idUser));
            $this->dashboard->SetUsername($username);
            $this->dashboard->SetIdUser($idUser);
        }
    }
?>