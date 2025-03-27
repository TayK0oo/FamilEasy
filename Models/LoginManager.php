<?php
require_once 'Model.php';
require_once 'Login.php';

/**
 * Class LoginManager
 * @package GoodStructure\Models
 * @author Théo Cornu
 */
class LoginManager extends Model
{
    /**
     * LoginManager constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Get all logins from the database
     * @return array
     * @author Théo Cornu
     */
    public function getAll() : array {
        $sql = 'SELECT * FROM login';
        $logins = [];
        $resultat = $this->executerRequete($sql);
        while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $login = [
                'idLogin' => $ligne['id'],
                'username' => $ligne['username'],
                'Hash' => $ligne['Hash']
            ];

            $logins[] = $login;
        }
        return $logins;
    }

    /**
     * Retrieve a specific username by its LoginID from the database.
     *
     * @param int $idLogin
     * @return string|null
     */
    public function GetUsernameByIdLogin(int $idLogin) : ?string {
        $sql = 'SELECT username FROM login WHERE idLogin = ?';
        $resultat = $this->executerRequete($sql, [$idLogin]);

        $ligne = $resultat->fetch();
        if ($ligne !== false) {
            $username = $ligne['username'];

            return $username;
        } else {
            return null;
        }
    }

    /**
     * Get a login by its ID
     * @param int $id
     * @return Login|null
     * @author Théo Cornu
     */
    public function getByID(int $id): ?Login {
        $sql = 'SELECT * FROM login WHERE idLogin = ?';
        $resultat = $this->executerRequete($sql, [$id]);

        $ligne = $resultat->fetch();
        if ($ligne !== false) {
            $login = new Login(
                $ligne['id'],
                $ligne['username'],
                $ligne['Hash']
            );

            return $login;
        } else {
            return null;
        }
    }

    /**
     * Delete a login by its ID
     * @param int $id
     * @return void
     * @author Théo Cornu
     */
    public function DeleteByID(int $id) : void {
        $sql = 'DELETE FROM login WHERE idLogin = ?';
        $this->executerRequete($sql, [$id]);
    }

    /**
     * Update a login by its ID
     * @param int $id
     * @param string $username
     * @param string $password
     */
    public function UpdateById(int $id, string $username, string $password) : void {
        $sql = 'UPDATE login SET username = ?, Hash = ? WHERE idLogin = ?';
        $this->executerRequete($sql,[$username, $password, $id]);
    }

    /**
     * Add a new login to the database
     * @param string $username
     * @param string $password
     * @return Login
     */
    public function Add(string $username, string $password) : Login{
        $sql = 'INSERT INTO login (username, Hash) VALUES (?, ?)';
        $login = new Login($username, $password);
        $this->executerRequete($sql, [$username, $login->getHash()]);
        return $login;
    }

    /**
     * Connect a login by its username and password
     * @param string $username
     * @param string $password
     * @return void
     */
    public function Connect(string $username, string $password) : void {
        try {
            $sql = 'SELECT * FROM login WHERE username = ?';
            $resultat = $this->executerRequete($sql, [$username]);
            
            $ligne = $resultat->fetch();
            if ($ligne !== false) {
                $login = new Login(
                    $ligne['username'],
                    $ligne['Hash']
                    
                );
                $login->setId($ligne['idLogin']);
                $login->setHash($ligne['Hash']);
                $logintocompare = new Login();
                $logintocompare->setPassword($password);
                if($login->getPassword() == $logintocompare->getPassword()) {
                    $_SESSION["IdLogin"] = $ligne['idLogin']; 
                } else {
                    throw new PDOException("IdLogin not definied.");
                }
            }
            
            
    
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            if (strpos($e->getMessage(), "IdLogin not definied.") !== false) {
                $errorMessage = "The session variable idLogin is not defined.";
            } else {
                $errorMessage = "An error occurred while connecting the Login.";
            }
            header("Location: index.php?action=Connection&errorMessage=".urlencode($errorMessage));
            exit();
        }
    
    }

    /**
     * Disconnect a login
     * @return void
     */
    public function Disconnect() : void {
        session_destroy();
        header("Location: ".$_SERVER['PHP_SELF']);
    }

    
    
}