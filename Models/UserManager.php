<?php
require_once 'Model.php';
require_once 'User.php';
require_once 'LoginManager.php';
require_once 'DashBoardManager.php';
/**
 * This file manages all operations related to User (registration) directly with the database
 * @author Théo Cornu
 */
class UserManager extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retrieve a list of Users from the database.
     *
     * @return array An array of User objects.
     * @author Théo Cornu
     */
    
    public function GetAll(): array
    {
        try {
            $sql = 'SELECT * FROM users';
            $Users = [];
            $result = $this->executerRequete($sql);
            while ($line = $result->fetch(PDO::FETCH_ASSOC)) {
                $User = new User(
                    $line['login'],
                    $line['password'],
                    $line['firstName'],
                    $line['lastName'],
                    $line['email'],
                    $line['gender'],
                    $line['familyPlace'],
                    $line['birthDate']
                );

                $Users[] = $User;
            }
            return $Users;
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while retrieving data.";
            header("Location: index.php?action=Registration&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Retrieve a specific idUser by its LoginID from the database.
     *
     * @param int $id The LoginID of the User to retrieve.
     * @return int|null The id of the User, or null if not found.
     * @throws Exception
     */
    public function GetIdUserByLoginId(int $id): ?int
    {
        try {
            $sql = 'SELECT idUsers FROM users WHERE LoginidLogin = ?';
            $result = $this->executerRequete($sql, [$id]);
            $line = $result->fetch(PDO::FETCH_ASSOC);
            return $line['idUsers'];
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while retrieving data(lidUser).";
            header("Location: index.php?action=Index&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Retrieve a list of total duration by task done by all users in a home from the database.
     *
     * @param int $homeId The ID of the home.
     * @return array An array of total durations by task.
     * @throws Exception
     */
    public function GetTotalDurationByTask(int $homeId): array
    {
        try {
            $sql = 'SELECT t.Name AS taskName, SUM(t.Duration) AS totalDuration
                    FROM task AS t
                    JOIN dashboard AS d ON t.DashBoardidDashBoard = d.idDashBoard
                    JOIN users AS u ON d.UseridUser = u.idUsers
                    JOIN myhome AS h ON u.MyHomeIdMyHome = h.idMyHome
                    WHERE h.idMyHome = ?
                    GROUP BY t.Name';

            $result = $this->executerRequete($sql, [$homeId]);
            $totalDurations = [];

            while ($line = $result->fetch(PDO::FETCH_ASSOC)) {
                $totalDurations[$line['taskName']] = $line['totalDuration'];
            }

            return $totalDurations;
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while retrieving data(totalDuration).";
            header("Location: index.php?action=Index&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Retrieve a specific idDashboard by its userID from the database.
     *
     * @param int $id The userID of the User to retrieve.
     * @return int|null The id of the Dashboard, or null if not found.
     * @throws Exception
     */
    public function GetIdDashBoardByUserId(int $id): ?int
    {
        try {
            $sql = 'SELECT DashBoardidDashBoard FROM users WHERE idUsers = ?';
            $result = $this->executerRequete($sql, [$id]);
            
            $line = $result->fetch(PDO::FETCH_ASSOC);
            return $line['DashBoardidDashBoard'];
            
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while retrieving data(idDashBoard).";
            header("Location: index.php?action=Index&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

   /**
     * Retrieve a specific idUser by its DashBoardID from the database.
     *
     * @param int $id The DashBoardID of the User to retrieve.
     * @return int|null The id of the User, or null if not found.
     * @throws Exception
     */
    public function GetIdUserByDashBoardId(int $id): ?int
    {
        try {
            $sql = 'SELECT idUser FROM users WHERE DashBoardidDashBoard = ?';
            $result = $this->executerRequete($sql, [$id]);
            $line = $result->fetch(PDO::FETCH_ASSOC);
            return $line['idUser'];
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while retrieving data(idUser).";
            header("Location: index.php?action=Index&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Retrieve a specific User by its LoginID from the database.
     *
     * @param int $id The LoginID of the User to retrieve.
     * @return User|null The User object, or null if not found.
     * @author Théo Cornu
     */
    public function GetByLoginID(int $id): ?User
    {
        try {
            $sql = 'SELECT * FROM users WHERE LoginidLogin = ?';
            $result = $this->executerRequete($sql, [$id]);
            $line = $result->fetch();
            if ($line !== false) { //(LastName, FirstName, Gender, BirthDate, Email, FamilyPlace, LoginidLogin, DashBoardidDashBoard)
                $User = new User(
                    $line['LastName'],
                    $line['FirstName'],
                    $line['Gender'],
                    $line['BirthDate'],
                    $line['Email'],
                    $line['FamilyPlace']
                );

                return $User;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while retrieving the User.";
            header("Location: index.php?action=Registration&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Delete a User by its ID.
     *
     * @param int $id The ID of the User to delete.
     * @author Théo Cornu
     */
    public function DeleteByID(int $id): void
    {
        try {
            $sql = 'DELETE FROM users WHERE idUsers = ?';
            $this->executerRequete($sql, [$id]);
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while deleting the User.";
            header("Location: index.php?action=Registration&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Update a User by its ID with a new username and password.
     *
     * @param int $id The ID of the User to update.
     * @param string $username The new username.
     * @param string $password The new password.
     * @author Théo Cornu
     */
    public function UpdateById(int $id, string $username, string $password): void
    {
        try {
            $sql = 'UPDATE users SET username = ?, password = ? WHERE idUsers = ?';
            $this->executerRequete($sql, [$username, $password, $id]);
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while updating the User.";
            header("Location: index.php?action=Registration&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Add a new User to the database.
     *
     * @param User $User The User to add.
     * @author Théo Cornu
     */
    public function AddUser(User $User): void
    {
        try {
            

            // Add a login associated with the User
            $loginManager = new LoginManager();
            $login = $loginManager->Add($User->getLogin(), $User->getPassword());

            // Get the ID of the last login added
            $sql = 'SELECT idLogin FROM login ORDER BY idLogin DESC LIMIT 1';
            $result = $this->executerRequete($sql);
            $line = $result->fetch();
            $login->setId($line['idLogin']);

            //Add a dashboard associated with the User
            $dashBoardManager = new DashBoardManager();
            $dashBoard = $dashBoardManager->Add($login->getLogin() ."'s dashboard");

            // Get the ID of the last dashboard added
            $sql = 'SELECT idDashBoard FROM dashboard ORDER BY idDashBoard DESC LIMIT 1';
            $result = $this->executerRequete($sql);
            $line = $result->fetch();
            $dashBoard->setId($line['idDashBoard']);

            $sql = ("INSERT INTO users (LastName, FirstName, Gender, BirthDate, Email, FamilyPlace, LoginidLogin, DashBoardidDashBoard) 
            VALUES (:value1, :value2, :value3, :value4, :value5, :value6, (SELECT idLogin from login where idLogin = :value7), (SELECT idDashBoard from dashboard where idDashBoard = :value8))");

            $value1 = $User->getLastName();
            $value2 = $User->getFirstName();
            $value3 = $User->getGender();
            $value4 = $User->getBirthDate();
            $value5 = $User->getEmail();
            $value6 = $User->getFamilyPlace();
            $value7 = $login->getId();
            $value8 = $dashBoard->getId();
            $this->executerRequete($sql, [
                ':value1' => $value1,
                ':value2' => $value2,
                ':value3' => $value3,
                ':value4' => $value4,
                ':value5' => $value5,
                ':value6' => $value6,
                ':value7' => $value7,
                ':value8' => $value8
            ]);

            // header("Refresh : 1, Location: index.php?action=Index");

        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while adding the User.";
            if (strpos($e->getMessage(), "Duplicate entry") !== false) {
                $errorMessage = "The email address or username is already in use.";
            }

            header("Location: index.php?action=Registration&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Update a User in the database with new information.
     *
     * @param User $User The updated User.
     * @author Théo Cornu
     */
    public function UpdateUser(User $User): void
    {
        try {
            $sql = 'UPDATE users SET FirstName = ?, LastName = ?, Email = ?, Gender = ?, FamilyPlace = ?, BirthDate = ? WHERE idUsers = ?';
            $this->executerRequete($sql, [
                $User->getFirstName(),
                $User->getLastName(),
                $User->getEmail(),
                $User->getGender(),
                $User->getFamilyPlace(),
                $User->getBirthDate()
            ]);
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while updating the User.";
            header("Location: index.php?action=Registration&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Retrieve a specific name of the user by its userID from the database.
     *
     * @param int $id The userID of the User to retrieve.
     * @return string|null The name of the User, or null if not found.
     * @throws Exception
     */
    public function GetNameById(int $id): ?string
    {
        try {
            $sql = 'SELECT FirstName FROM users WHERE idUsers = ?';
            $result = $this->executerRequete($sql, [$id]);
            $line = $result->fetch(PDO::FETCH_ASSOC);
            return $line['FirstName'];
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while retrieving data(idUser).";
            header("Location: index.php?action=Index&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Update a User in the database with new information.
     *
     * @param int $idUser The ID of the User to update.
     * @param int $idMyHome The ID of the MyHome to update.
     * @throws Exception
     */
    public function UpdateUserHome(int $idUser, int $idMyHome): void
    {
        try {
            $sql = 'UPDATE users SET MyHomeidMyHome = ? WHERE idUsers = ?';
            $this->executerRequete($sql, [$idMyHome, $idUser]);
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while updating the User.";
            header("Location: index.php?action=MyHome&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Retrieve de id of the MyHome of the User if it exists.
     * @param int $idUser The ID of the User to retrieve.
     * @return int|null The ID of the MyHome, or null if not found.
     * @throws Exception
     */
    public function GetIdMyHomeByIdUser(int $idUser): ?int
    {
        try {
            $sql = 'SELECT MyHomeidMyHome FROM users WHERE idUsers = ?';
            $result = $this->executerRequete($sql, [$idUser]);
            $line = $result->fetch(PDO::FETCH_ASSOC);
            return $line['MyHomeidMyHome'];
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred retrieving the MyHome.";
            header("Location: index.php?action=MyHome&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }
}
?>
