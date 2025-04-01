<?php
/**
 * This file manages everything related to User (registration) directly.
 * @author Théo Cornu
 */

require_once 'Views/View.php';
require_once 'Models/UserManager.php';
require_once 'Controllers/MainController.php';
require_once 'Models/LoginManager.php';
require_once 'Models/DashBoardManager.php';

class UserController{
    
    private $UserManager;
    private $mainController;
    private $loginManager;
    private $dashboardController;
    private $registrationView;
    private $dashboardView;
    private $User;

    /**
     * UserController constructor.
     */
    public function __construct() {
        $this->UserManager = new UserManager();
        $this->mainController = new MainController();
        $this->loginManager = new LoginManager();
        $this->dashboardController = new DashBoardController();
        $this->User = new User();

    }

    /**
     * Add a new User or update an existing one.
     */
    public function Add() {
        // Check if the request method is POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Determine whether to update or create a User
            if (isset($_GET['IdUser'])) {
                $this->UpdateUser();
            } else {
                $this->createUser();
            }
        } else {
            // Check if there is an error message to display
            $errorMessage = isset($_GET['errorMessage']) ? $_GET['errorMessage'] : null;
            // Display the registration form with the error message
            $this->registrationView->generer(['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Delete a User.
     */
    public function Delete() {
        // Delete a User
        $this->UserManager->DeleteByID($_POST["idUser"]);
        // Redirect to the main page
        $this->mainController->Index("User supprimé");
    }

    /**
     * Convert family place to string.
     * @return string
     */
    private function FamilyPlaceToString(){
        $familyPlace = "";
        $tempConcat = ", ";
        $fieldsToCheck = [
            'parent', 'child', 'grandParent', 'grandChild', 'uncle/aunt',
            'cousin', 'nephew/niece', 'stepchild', 'in-law', 'step-parent',
            'half-sibling', 'otherPlace'
        ];

        foreach ($fieldsToCheck as $field) {
            if (isset($_POST[$field]) && $_POST[$field] !== null) {
                $familyPlace .= $_POST[$field] . $tempConcat;
            }
        }
        $familyPlace = substr($familyPlace, 0, -2);
        return $familyPlace;
    }

    /**
     * Update an existing User.
     * Non focntionnel
     */
    public function UpdateUser() {
        // Retrieve the User to update
        $updateUser = $this->UserManager->GetByLoginID(intval($_GET['IdLogin']));
        $this->populateUser($updateUser);
        // Update the User
        $this->UserManager->UpdateUser($updateUser);
        // Redirect to the main page
        $this->mainController->Index('Le User '.$_POST['Username'].' a bien été modifié !');
        
    }

    /**
     * Create a new User and connect the user.
     */
    private function createUser() {
        // Create a new User
        
        $this->populateUser();
        // Add the new User
        $this->UserManager->AddUser($this->User );
        
        // header('Location: index.php?action=Index');
        // Connect the user
        $this->loginManager->Connect($_POST['Username'], $_POST['Password']);

        // Redirect to the main page
        $this->mainController->Index('Welcome among us '.$_POST['Username']);
    }

    /**
     * Set the properties of the User object.
     * @param User $User
     */
    private function populateUser() {
        // Set the properties of the User object
        $this->User ->setPassword($_POST['Password']);
        $this->User ->setFirstName($_POST['Firstname']);
        $this->User ->setLastName($_POST['Lastname']);
        $this->User ->setEmail($_POST['Email']);
        $this->User ->setGender($_POST['Gender']);
        $this->User ->setFamilyPlace($this->FamilyPlaceToString());
        $this->User ->setBirthDate($_POST['YearOfBirth'] . "-" . $_POST['MonthOfBirth'] . "-" . $_POST['DayOfBirth']);
        $this->User ->setLogin($_POST['Username']);
    } 
}
