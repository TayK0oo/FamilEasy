<?php
/**
 * 
 * This abstract class represents a model in the MVC architecture. It provides a database connection and a method to execute SQL queries.
 * 
 * @author Théo Cornu
 */
require_once 'Config.php';
abstract class Model {
    private ?PDO $db = null;

    /**
     * Constructor that initializes the database connection.
     */
    public function __construct() {
        $this->getDB();
    }

    /**
     * Executes an SQL query, possibly with parameters.
     * 
     * @param string $sql The SQL query to execute.
     * @param array|null $params An array of parameters to bind to the query.
     * @return PDOStatement|false The result of the query, or false if an error occurred.
     */
    protected function executerRequete(string $sql, array $params = null) : PDOStatement|false{
        if ($params == null) {
            $resultat = $this->getDB()->query($sql);    // exécution directe
        }
        else {
            $resultat = $this->getDB()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Returns a database connection object, initializing the connection if necessary.
     * 
     * @return PDO The database connection object.
     */
    private function getDB(): PDO {
        if ($this->db === null) {
            try {
                $host_db = Config::get('DB.dsn');
                $user = Config::get('DB.user');
                $pass = Config::get('DB.pass');
                $this->db = new PDO($host_db, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch (PDOException $e) {
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }
        return $this->db;
    }
}