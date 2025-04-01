<?php
require_once 'Model.php';
require_once 'Task.php';
require_once 'DashBoard.php';
require_once 'Controllers/MainController.php';
require_once 'Models/DashBoardManager.php';


/**
 * Class DashBoardManager
 * @package GoodStructure\Models
 * @author Nicolas
 * @author Théo Cornu
 */
class TaskManager extends Model
{

    /**
     * TaskManager constructor.
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retrieve a list of Tasks by its dashboard from the database.
     *
     * @param int $idDashBoard The ID of the dashboard to retrieve the tasks from.
     * @return array|null An array of Task objects, or null if no tasks are found.
     * @author Théo Cornu
     */
    public function GetAllByDashBoard(int $idDashBoard): ?array
    {
        try {

            // Retrieve the tasks associated with the dashboard
            $sql = 'SELECT * FROM task WHERE DashBoardidDashBoard = ?';
            $Tasks = [];
            $result = $this->executerRequete($sql, [$idDashBoard]);
            while ($line = $result->fetch(PDO::FETCH_ASSOC)) {
                $Task = new Task(
                    $line['idTask'],
                    $line['name'],
                    $line['Duration'],
                    $line['Date'],
                    $line['DashBoardidDashBoard'],
                    
                );

                $Tasks[] = $Task;
            }
            return count($Tasks) > 0 ? $Tasks : null;
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while retrieving data.";
            header("Location: index.php?action=DashBoard&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Retrieve a specific Task by its ID from the database.
     *
     * @param int $id The ID of the Task to retrieve.
     * @return Task|null The Task object, or null if not found.
     * @throws Exception
     */
    public function GetByID(int $id): ?Task
    {
        try {
            $sql = 'SELECT * FROM task WHERE idTask = ?';
            $result = $this->executerRequete($sql, [$id]);
            $line = $result->fetch(PDO::FETCH_ASSOC);
            $Task = new Task(
                $line['idTask'],
                $line['name'],
                $line['Duration'],
                $line['Date'],
                $line['DashBoardidDashboard'],
                
            );
            return $Task;
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while retrieving data.";
            header("Location: index.php?action=DashBoard&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Add a new Task to the database.
     *
     * @param Task $Task The Task to add.
     * @return Task The Task object, or null if not found.
     * @throws Exception
     */
    public function AddTask(Task $Task): Task
    {
        try {
            $sql = 'INSERT INTO task (name, Duration, Date, DashBoardidDashboard) VALUES (:value1, :value2, :value3, :value4)';
            $this->executerRequete($sql, [
                ':value1' => $Task->getNameTask(),
                ':value2' => $Task->getDuration(),
                ':value3' =>  $Task->getDateAdded(),
                ':value4' =>  $Task->getIdDashBoard()
            ]);
            //$Task->setId($this->getLastInsertID());
            return $Task;
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while adding the Task.";
            header("Location: index.php?action=DashBoard&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Update an existing Task in the database.
     *
     * @param Task $Task The Task to update.
     * @return Task The Task object, or null if not found.
     * @throws Exception
     */
    public function UpdateTask(Task $Task): Task
    {
        try {
            $sql = 'UPDATE task SET name = :value1, Duration = :value2, Date = :value3 WHERE idTask = :value5';
            $this->executerRequete($sql, [
                ':value1' => $Task->getNameTask(),
                ':value2' => $Task->getDuration(),
                ':value3' =>  $Task->getDateAdded(),
                ':value5' =>  $Task->getId()
            ]);
            return $Task;
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while updating the Task.";
            header("Location: index.php?action=DashBoard&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Delete a Task from the database.
     *
     * @param int $id The ID of the Task to delete.
     * @throws Exception
     */
    public function DeleteByID(int $id)
    {
        try {
            $sql = 'DELETE FROM task WHERE idTask = ?';
            $this->executerRequete($sql, [$id]);
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "An error occurred while deleting the Task.";
            header("Location: index.php?action=DashBoard&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }

    /**
     * Check if a Task already exists in the database.
     *
     * @param Task $Task The name of the Task to check.
     * @return bool True if the Task exists, false otherwise.
     * @throws Exception
     */
    public function CheckIfTaskExists(Task $Task): bool
    {
        try {
            if ($Task->getDuration() != null) {
                $sql = 'SELECT COUNT(*) FROM task WHERE name = ? AND Date = ? AND Duration = ? AND idTask != ?';
                $result = $this->executerRequete($sql, [$Task->getNameTask(), $Task->getDateAdded(), $Task->getDuration(), $Task->getId()]);
                $line = $result->fetch(PDO::FETCH_NUM);
                return $line[0] > 0;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // In case of an error, redirect to the error page with a message
            $errorMessage = "The Task already exists.";
            header("Location: index.php?action=DashBoard&errorMessage=".urlencode($errorMessage));
            exit();
        }
    }
}
