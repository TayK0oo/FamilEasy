<?php
    require_once 'Model.php';
    require_once 'MyHome.php';

    /**
     * Class MyHomeManager
     * @author Enzo
     * @author Théo
     */
    class MyHomeManager extends Model {
        public function __construct() {
            parent::__construct();
        }

        /**
         * Add a new home to the database
         * @author Théo Cornu
         * @author Enzo
         * @param $myHome the myHome object to add
         * @return MyHome return a MyHome object
         */
        public function AddMyHome(MyHome $myHome) : MyHome {
            try {
                $sql = "INSERT INTO myhome (nameMyHome, codeMyHome) VALUES (:value1, :value2)";
                $this->executerRequete($sql, [
                    ":value1"=> $myHome->GetNameMyHome(),
                    ":value2"=> $myHome->GetCodeMyHome()
                ]);
                $myHome->SetIdMyHome($this->GetLastIdMyHome());
                return $myHome;
            } catch (Exception $e) {
                // if error, we are redirect to the index page with an error
                $errorMessage = "An error occured while adding the home";
                header("Location : index.php?action=MyHome&errorMessage".urlencode($errorMessage));
                exit();
            }
        }

        /**
         * Get the last id of the home added in the database
         * @author Théo
         * @return int return the last id of the home added in the database
         */
        public function GetLastIdMyHome(): int {
            try {
                $sql = "SELECT MAX(idMyHome) as lastId FROM myhome";
                $result = $this->executerRequete($sql);
                $lastIdMyHome = $result->fetch(PDO::FETCH_ASSOC)['lastId'];
                return (int) $lastIdMyHome;
            } catch (Exception $e) {
                // if error, we are redirect to the index page with an error
                $errorMessage = "An error occurred while getting the last id of the home";
                header("Location: index.php?action=MyHome&errorMessage=" . urlencode($errorMessage));
                exit();
            }
        }

        /**
         * Update a home in the database
         * @author Enzo
         * @param $myHome the myHome object to update
         * @return MyHome return a myHome object
         */
        public function UpdateMyHome(MyHome $myHome) : MyHome {
            try {
                $sql = "UPDATE myhome SET nameMyHome = :value1 WHERE idMyHome = :value2";
                $this->executerRequete($sql, [
                    ":value1"=> $myHome->GetNameMyHome(),
                    ":value2"=> $myHome->GetIdMyHome()
                ]);
                return $myHome;
            } catch (Exception $e) {
                // if error, we are redirect to the index page with an error
                $errorMessage = "An error occured while updating the home";
                header("Location : index.php?action=MyHome&errorMessage".urlencode($errorMessage));
                exit();
            }
        }

        /**
         * Delete a home in the database
         * @author Enzo
         * @param $idMyHome id of myHome
         */
        public function DeleteMyHome(int $idMyHome) : void {
            try {
                $sql = "DELETE FROM myhome WHERE idMyHome = :value1";   
                $this->executerRequete($sql, [
                    ":value1"=> $idMyHome
                ]);
            } catch (Exception $e) {
                // if error, we are redirect to the index page with an error
                $errorMessage = "An error occured while deleting the home";
                header("Location : index.php?action=MyHome&errorMessage".urlencode($errorMessage));
                exit();
            }
        }

        /**
         * Get a home in the database by id
         * @author Théo
         * @param $idMyHome id of myHome
         * @return MyHome return a myHome object
         */
        public function GetMyHome(int $idMyHome) : MyHome {
            try {
                $sql = "SELECT * FROM myhome WHERE idMyHome = :value1";
                $result = $this->executerRequete($sql, [
                    ":value1"=> $idMyHome
                ]);
                $myHome = $result->fetch(PDO::FETCH_ASSOC);
                return new MyHome($myHome);
            } catch (Exception $e) {
                // if error, we are redirect to the index page with an error
                $errorMessage = "An error occured while getting the home";
                header("Location : index.php?action=MyHome&errorMessage".urlencode($errorMessage));
                exit();
            }
        }

        /**
         * Get the last id of a home in the database by its code
         * @param string $codeMyHome code of myHome
         * @return int|null return the last id of the home
         */
        public function GetLastIdMyHomeByCode(string $codeMyHome) : int|null{
            try {
                $sql = "SELECT MAX(idMyHome) AS lastId FROM myhome WHERE codeMyHome = :value1";
                $result = $this->executerRequete($sql, [
                    ":value1"=> $codeMyHome
                ]);
                $lastIdMyHome = $result->fetch(PDO::FETCH_ASSOC)['lastId'];
                return (int) $lastIdMyHome;
            } catch (Exception $e) {
                // if error, we are redirect to the index page with an error
                $errorMessage = "An error occurred while getting the last id of the home";
                header("Location: index.php?action=MyHome&errorMessage=" . urlencode($errorMessage));
                exit();
            }
        }

        /**
         * Delete a user from a home in the database
         * @author Théo
         * @param int $idUser id of user
         * @param int $idMyHome id of myHome
         */
        public function DeleteUserFromMyHome(int $idUser, int $idMyHome) : void {
            try {
                $sql = "DELETE FROM usermyhome WHERE idUser = ? AND idMyHome = ?";
                $this->executerRequete($sql, [$idUser,$idMyHome]);
            } catch (Exception $e) {
                // if error, we are redirect to the index page with an error
                $errorMessage = "An error occured while deleting the user from the home";
                header("Location : index.php?action=MyHome&errorMessage".urlencode($errorMessage));
                exit();
            }
        }

        /**
         * Get the number of homes in the database
         * @author Théo
         *
         * @return int
         */
        public function GetNumberOfHomes() : int {
            try {
                $sql = "SELECT COUNT(*) FROM myhome";
                $result = $this->executerRequete($sql);
                $numberOfHomes = $result->fetch(PDO::FETCH_ASSOC);
                return $numberOfHomes;
            } catch (Exception $e) {
                // if error, we are redirect to the index page with an error
                $errorMessage = "An error occured while getting the number of homes";
                header("Location : index.php?action=MyHome&errorMessage".urlencode($errorMessage));
                exit();
            }
        }

        /**
         * Get the number of users in a home
         * @author Théo
         *
         * @param int $idMyHome
         * @return int
         */
        public function GetNumberOfUsersInMyHome(int $idMyHome) : int {
            try {
                $sql = "SELECT COUNT(*) FROM myhome WHERE idMyHome = ?";
                $result = $this->executerRequete($sql, [ $idMyHome
                ]);
                $numberOfUsers = $result->fetch(PDO::FETCH_ASSOC);
                return $numberOfUsers;
            } catch (Exception $e) {
                // if error, we are redirect to the index page with an error
                $errorMessage = "An error occured while getting the number of users in the home";
                header("Location : index.php?action=MyHome&errorMessage".urlencode($errorMessage));
                exit();
            }

        }

        

    }
?>