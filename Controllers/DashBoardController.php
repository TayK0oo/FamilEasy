<?php

use Controllers\MainController;

require_once __DIR__ . '/../Views/View.php';
require_once __DIR__ . '/../Models/DashBoardManager.php';
require_once __DIR__ . '/../Models/TaskManager.php';
require_once __DIR__ . '/../Models/UserManager.php';

/**
 * Class DashBoardController
 * @package Controllers
 * @author Théo Cornu
 */
class DashBoardController {

    private UserManager $UserManager;
    private DashBoardManager $DashBoardManager;
    private TaskManager $TaskManager;
    private MainController $mainController;
    private LoginManager $loginManager;
    private DashBoard $DashBoard;

    /**
     * DashBoardController constructor.
     */
    public function __construct() {
        $this->UserManager = new UserManager();
        $this->DashBoardManager = new DashBoardManager();
        $this->TaskManager = new TaskManager();
        $this->mainController = new MainController();
        $this->loginManager = new LoginManager();
        $this->DashBoard = new DashBoard();

    }

    /**
     * Delete a DashBoard.
     */

    public function Delete() {
        // Delete a DashBoard
        $this->DashBoardManager->DeleteByID($_POST["idDashBoard"]);
        // Redirect to the main page
        $this->mainController->Index("DashBoard supprimé");
    }

    /**
     * Update a DashBoard.
     * @throws Exception
     */

    public function UpdateDashBoard(): void
    {
        $this->populateDashBoard();
        // Update the DashBoard
        $this->DashBoardManager->UpdateDashBoard($this->DashBoard);
    }

    /**
     * Set the properties of the DashBoard object.
     * 
     */
    public function populateDashBoard(): void
    {
        $idUser = $this->UserManager->GetIdUserByLoginId(intval($_SESSION['IdLogin']));
        $username = $this->loginManager->GetUsernameByIdLogin(intval($_SESSION['IdLogin']));
        
        $this->DashBoard->SetId($this->UserManager->GetIdDashboardByUserId($idUser));
        $this->DashBoard->SetUsername($username);
        $this->DashBoard->SetIdUser($idUser);
    }

    /**
     * Display the DashBoard page.
     * @throws Exception
     */

    public function InfoDashBoard($message = null): void
    {
        // Check if the user is connected
        if (!isset($_SESSION['IdLogin'])) {
            // Redirect to the main page with an error message
            $this->mainController->Index("Vous devez être connecté pour accéder à cette page");
        } else {
            // // Retrieve the idUser
            // $idUser = $this->UserManager->GetIdUserByLoginId(intval($_SESSION['IdLogin']));
            // // Retrieve the DashBoard
            // $idDashboard = $this->UserManager->GetIdDashBoardByUserId($idUser);
            // // Retrieve the DashBoard
            
            $this->UpdateDashBoard();

            // Retrieve the Tasks
            $tasks = $this->TaskManager->GetAllByDashBoard($this->DashBoard->GetId());
            // Send to the session the list of Tasks
            $_SESSION['tasks'] = $tasks;

            // Redirect to the main page
            
            if (isset($_SESSION['tasks']) &&  $_SESSION['tasks'] != null){
                $this->mainController->DashBoard($message, end($tasks)->getId(), end($tasks)->getNameTask(), end($tasks)->getDuration(), end($tasks)->getDateAdded());
            }
            else{
                $this->mainController->DashBoard($message);
            }
            
            
        }

    }
}