<?php
    require_once 'MainController.php';
    require_once 'Models/MyHomeManager.php';
    require_once 'Models/UserManager.php';

    /**
     * Class MyHomeController
     * @author Enzo
     */
    class MyHomeController {
        private $mainController;
        private $userManager;
        private $myHomeManager;
        private $myHome;
        

        public function __construct() {
            $this->mainController = new MainController();
            $this->myHomeManager = new MyHomeManager();
            $this->userManager = new UserManager();
            $this->myHome = new MyHome();
        }

        /**
         * Allows to add a Home
         * @author Théo Cornu
         */
        public function AddHome() {
            // Set the properties of the MyHome object
            $this->populateMyHome();

            // Add a home
            $this->myHome = $this->myHomeManager->AddMyHome($this->myHome);

            //get the id of the user by the id login
            $idUser = $this->userManager->GetIdUserByLoginId($_SESSION["IdLogin"]);

            // Update the user's home
            $this->userManager->UpdateUserHome($idUser, $this->myHome->GetIdMyHome());

            // set the session variable to the id of the home
            $_SESSION["IdMyHome"] = $this->myHome->GetIdMyHome();

            // Redirect to the main page
            $this->mainController->Index("Home create");
        }

        /**
         * Allows to delete a Home by ID
         * @author Théo Cornu
         * @param int $id The ID of the Home to delete
         * @return void
         * @throws Exception If the Home ID is invalid
         * @throws Exception If the Home could not be deleted
         */
        public function DeleteHome() {
            // Delete a Home
            $this->myHomeManager->DeleteMyHome($_POST["idHome"]);

            // Redirect to the main page
            $this->mainController->Index("Home delete");
        
        }

        /**
         * Allows to edit a Home by ID
         * @author Théo Cornu
         * @param int $id The ID of the Home to edit
         * @param string $name The new name
         * @param string $code The new code
         * @return void
         * @throws Exception If the Home ID is invalid
         * @throws Exception If the Home could not be updated
         */
        public function EditHome() {


            // Edit a Home
            $this->myHomeManager->UpdateMyHome($_POST["idHome"], $_POST["NameHome"], strval($_POST["CodeHome"]));

            // Redirect to the main page
            $this->mainController->Index("Home edited");
        }

        /**
         * Allows to add a User to a Home
         * @author Théo Cornu
         * 
         * @param int $idHome The ID of the Home to add the User to
         * @param int $idUser The ID of the User to add to the Home
         * @return void
         * @throws Exception If the Home ID is invalid
         * @throws Exception If the User ID is invalid
         * @throws Exception If the User could not be added to the Home
         */
        public function AddUserToHome() {
            // Get the id of the user by the id login
            $idUser = $this->userManager->GetIdUserByLoginId($_SESSION["IdLogin"]);

            //Get the name of the user by its id
            $username = $this->userManager->GetNameById($idUser);

            // Get the id of the home by the code of the home
            $idHome = $this->myHomeManager->GetLastIdMyHomeByCode(strval($_POST["CodeHome"]));

            if ($idHome == null) {
                // Redirect to the main page
                $this->mainController->Index("Home not found");
            }

            else {
                // Add a user to a home
                $this->userManager->UpdateUserHome($idUser, $idHome);

                // Redirect to the main page
                $this->mainController->Index("Welcome to home $username");
            }
        }


        /**
         * Allows to delete a User from a Home
         * @author Théo Cornu
         * @param int $idHome The ID of the Home to delete the User from
         * @param int $idUser The ID of the User to delete from the Home
         * @return void
         * @throws Exception If the Home ID is invalid
         * @throws Exception If the User ID is invalid
         * @throws Exception If the User could not be deleted from the Home
         */
        public function DeleteUserFromHome() {
            // Get the id of the user by the id login
            $idUser = $this->userManager->GetIdUserByLoginId($_SESSION["IdLogin"]);

            // Delete a user from a home
            $this->myHomeManager->DeleteUserFromMyHome($idUser, $_POST["CodeHome"]);

            // Redirect to the main page
            $this->mainController->Index("User deleted from home");
        }

        /**
         * Set the properties of the MyHome object.
         * @param MyHome $MyHome The MyHome object to populate
         */
        private function populateMyHome() {
            // Set the properties of the MyHome object
            $this->myHome->SetNameMyHome($_POST["NameHome"]);
            $this->myHome->SetCodeMyHome(strval($_POST["CodeHome"]));

        }
        
        
        


    }
?>