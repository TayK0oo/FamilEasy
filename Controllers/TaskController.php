<?php

use Controllers\MainController;
use Models\TaskService;

require_once 'Views/View.php';
require_once 'Models/TaskManager.php';
require_once 'Models/UserManager.php';
require_once 'Controllers/DashBoardController.php';

/**
 * Class RouteTaskRegistration
 * @package Controllers
 * @author Nicolas
 * @author Théo
 */

class TaskController
{
   private DashBoardController $DashBoardController;
   private MainController $MainController;
   private DashBoardManager $DashBoardManager;
   private TaskManager $TaskManager;  
   private Task $Task;
    private TaskService $taskService;

   /**
    * TaskController constructor.
    * @author Théo
    */
   public function __construct()
   {
      $this->DashBoardController = new DashBoardController();
      $this->MainController = new MainController();
      $this->DashBoardManager = new DashBoardManager();
      $this->TaskManager = new TaskManager();
      $this->Task = new Task();
       $this->taskService = new TaskService();
   }

   /**
     * Add a new Task or update an existing one.
    * @author Théo
     */
   public function AddTask()
   {
      // Check if the request method is POST
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // Determine whether to update or create a Task
         if ($_GET['action'] == "TaskModification") {
             $this->UpdateTask();
         } else {
             $this->createTask();
         }
     } else {
         // Check if there is an error message to display
         $errorMessage = isset($_GET['errorMessage']) ? $_GET['errorMessage'] : null;
         // Display the registration form with the error message
         $this->DashBoardController->infoDashBoard($errorMessage); 
     }
   }

   

   /**
    * Delete a Task if it exists, otherwise display an error message.
    * @author Théo
    */
   public function DeleteTask()
   {
      
      // Check if the Task exists
      if (isset($_SESSION['tasks']) && (end($_SESSION['tasks']))->getId() != null) {
         // Delete a Task
         $this->TaskManager->DeleteByID((end($_SESSION['tasks']))->getId());
         // Redirect to the main page
         $this->DashBoardController->infoDashBoard("Tâche supprimée");
      } else {
         // Redirect to the main page with an error message
         $this->DashBoardController->infoDashBoard("La tâche n'existe pas");
      }
      
   }


   /**
    * Create a new Task.
    * @author Théo
    */
   private function createTask(): void
   {
      // Create a new Task
      $this->populateTask();

      // Check if the Task already exists
      if ($this->TaskManager->CheckIfTaskExists($this->Task)) {
         // Redirect to the registration page with an error message
         $this->DashBoardController->infoDashBoard("La tâche existe déjà");
      } else {
         // Add the new User
         $this->TaskManager->AddTask($this->Task);
         // Redirect to the main page
         $this->DashBoardController->infoDashBoard("Tâche créée");
         
      }
   }

   /**
    * Update an existing Task.
    * @author Théo
    */
   private function UpdateTask()
   {
      // Check if the Task exists
      if (isset($_SESSION['tasks']) && (end($_SESSION['tasks']))->getId() != null ) {
         $this->populateTask();
         // Update an existing Task
         $this->TaskManager->UpdateTask($this->Task);
         // Redirect to the main page
         $this->DashBoardController->infoDashBoard("Tâche modifiée");
      } else {
         // Redirect to the main page with an error message
         $this->DashBoardController->infoDashBoard("La tâche n'existe pas");
      }
   }

   private function populateTask()
   {
      if (isset($_SESSION['tasks'])) {
         // Set the properties of the Task object
         $this->Task->setId((end($_SESSION['tasks']))->getId());
      }
      // Set the properties of the Task object
      $this->Task->setNameTask($_POST['searchTask']);
      $this->Task->setDuration($_POST['hours']*4+$_POST['minutes']/15);
      $this->Task->setDateAdded($_POST['Date']);
      $this->Task->setIdDashBoard($this->DashBoardManager->GetIdDashBoardByLoginId($_SESSION['IdLogin']));
   }

    /**
     * Gestion de l'ajout de tâche personnalisée
     */
    public function AddCustomTask()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $taskData = [
                'id' => $this->generateTaskId($_POST['activity']),
                'activity' => $_POST['activity'],
                'description' => $_POST['description'],
                'quarter' => (int)$_POST['quarter'],
                'monetary' => (float)$_POST['monetary'],
                'example1' => $_POST['example1'] ?? '',
                'example2' => $_POST['example2'] ?? '',
                'image' => $_POST['image'] ?? 'default_task.png'
            ];

            if ($this->taskService->addCustomTask($_SESSION['IdLogin'], $taskData)) {
                $this->DashBoardController->infoDashBoard("Tâche personnalisée ajoutée");
            } else {
                $this->DashBoardController->infoDashBoard("Erreur lors de l'ajout");
            }
        } else {
            $this->showCustomTaskForm();
        }
    }

    /**
     * Affichage du formulaire d'ajout
     */
    private function showCustomTaskForm()
    {
        $view = new View("viewAddTask"); // Correspond au fichier de vue
        $view->generer([]);
    }


    /**
     * Modifie une tâche personnalisée existante
     * @author [Votre nom]
     */
    public function UpdateCustomTask()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['taskId'])) {
            $newData = [
                'activity' => $_POST['activity'],
                'description' => $_POST['description'],
                'quarter' => $_POST['quarter'] ?? 1,
                'monetary' => $_POST['monetary'] ?? 0,
                'example1' => $_POST['example1'] ?? '',
                'example2' => $_POST['example2'] ?? '',
                'image' => $_POST['image'] ?? 'default_task.png'
            ];

            if ($this->taskService->updateCustomTask($_SESSION['IdLogin'], $_GET['taskId'], $newData)) {
                $this->DashBoardController->infoDashBoard("Tâche mise à jour");
            } else {
                $this->DashBoardController->infoDashBoard("Erreur de mise à jour");
            }
        }
    }

    /**
     * Supprime une tâche personnalisée
     * @author [Votre nom]
     */
    public function DeleteCustomTask()
    {
        if (isset($_GET['taskId'])) {
            if ($this->taskService->deleteCustomTask($_SESSION['IdLogin'], $_GET['taskId'])) {
                $this->DashBoardController->infoDashBoard("Tâche supprimée");
            } else {
                $this->DashBoardController->infoDashBoard("Erreur de suppression");
            }
        }
    }

    /**
     * Génère un ID unique basé sur le nom de l'activité
     */
    private function generateTaskId(string $activity): string
    {
        return strtolower(str_replace(' ', '_', $activity)) . '_' . uniqid();
    }


}