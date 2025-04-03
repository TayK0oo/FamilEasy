<?php
/**
 * This file manages everything related to Login (connection) directly.
 * @author Théo Cornu
 */

use Controllers\MainController;

require_once 'Views/View.php';
require_once 'Models/LoginManager.php';
require_once 'Controllers/MainController.php';

class LoginController{

    private $loginManager;
    private $mainController;
    
    /**
     * LoginController constructor.
     */
    public function __construct() {
        $this->loginManager = new LoginManager();
        $this->mainController = new MainController();
    }

    /**
     * Allows to add a Login
     * @author Théo Cornu
     */
    public function Add() {
        

        $this->loginManager->Add($_POST["Username"], $_POST["Password"]);
        
        $this->mainController->Index("Login ajouté");
    }

    /**
     * Allows to delete a Login by ID
     * @author Théo Cornu
     */
    public function Delete() {

        $this->loginManager->DeleteByID($_POST["id"]);

        $this->mainController->Index("Login supprimé");
    }

    /**
     * Allows to edit a Login by ID
     * @param int $id The ID of the Login to edit
     * @param string $username The new username
     * @param string $password The new password
     * @return void
     * @throws Exception If the Login ID is invalid
     * @throws Exception If the Login could not be updated
     * @author Théo Cornu
     */
    public function Edit() {
        

        $this->loginManager->UpdateById($_POST["id"],$_POST["Username"], $_POST["Password"]);
        
        $this->mainController->Index("Login modifié");
    }

    /**
     * Allows to connect a Login by ID
     * @return void
     * @throws Exception If the Login could not be connected
     */
    public function Connect() {
       

        
        
        
        
        $this->loginManager->Connect($_POST["Username"], $_POST["Password"]);
        if (isset($_SESSION["IdLogin"])) {
            $userManager = new UserManager();
            $_SESSION["IdMyHome"] = $userManager->GetIdMyHomeByIdUser($userManager->GetIdUserByLoginId($_SESSION["IdLogin"]));
        }
        

        $this->mainController->Index("Login connecté");
    }

    /**
     * Allows to disconnect a Login
     * @param int $id The ID of the Login to disconnect
     * @return void
     * @throws Exception If the Login could not be disconnected
     */
    public function Disconnect() {
       

        $this->loginManager->Disconnect();
        
        $this->mainController->Index("Login déconnecté");
    }
}