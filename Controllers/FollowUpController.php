<?php
require_once 'Views/View.php';
require_once 'Controllers/MainController.php';
require_once 'Models/DashBoardManager.php';
require_once 'Models/UserManager.php';
require_once 'Models/TaskManager.php';
require_once 'Models/LoginManager.php';
require_once 'Models/MyHomeManager.php';

/**
 * Class FollowUpController
 * @author Enzo
 * @author [Your Name]
 */
class FollowUpController {
    private $mainController;
    private $taskManager;
    private $userManager;
    private $loginManager;
    private $dashboardManager;
    private $myHomeManager;
    private $dashboard;

    public function __construct() {
        $this->mainController = new MainController();
        $this->taskManager = new TaskManager();
        $this->userManager = new UserManager();
        $this->loginManager = new LoginManager();
        $this->dashboardManager = new DashBoardManager();
        $this->myHomeManager = new MyHomeManager();
        $this->dashboard = new DashBoard();
    }

    /**
     * Display the follow-up page
     */
    public function InfoFollowUp() {
        error_log("InfoFollowUp: Starting follow-up process...");

        if (!isset($_SESSION['IdLogin'])) {
            error_log("InfoFollowUp: User not logged in. Redirecting to index.");
            $this->mainController->Index("You must be connected to access this page");
            return;
        }

        error_log("InfoFollowUp: User is logged in.");

        // Update dashboard
        $this->UpdateDashboard();

        // Retrieve user and home IDs
        $userId = $this->dashboard->GetIdUser();
        error_log("InfoFollowUp: Retrieved user ID: " . $userId);

        // retrieve username by id
        $username = $this->dashboard->GetUsername();

        $myHomeId = $this->myHomeManager->getMyHomeIdByUserId($userId);
        error_log("InfoFollowUp: Retrieved MyHome ID: " . ($myHomeId ?? 'NULL'));

        // Calculate task data
        $taskData = $this->calculateTaskDataD($userId, $myHomeId);

        //affiche dans les logs les données des taches
        error_log("InfoFollowUp: Task data: " . print_r($taskData, true));

        $user = $this->userManager->GetByLoginId(intval($_SESSION['IdLogin']));
        $userType = $user->getUserType();
        // Load the appropriate tasks file based on user type
        $tasksFile = ($userType === 'enterprise') ? 'tasksEntreprise.json' : 'tasks.json';
        $tasksJson = file_get_contents(__DIR__ . '/../Public/data/' . $tasksFile);
        $tasksData = json_decode($tasksJson, true);
        error_log("InfoFollowUp: Loaded tasks from JSON.");

        // Merge data and display view
        $additionalDataTask = array_merge($taskData, [
            "tasks" => $tasksData['tasks'],
            "username" => $username
        ]);

        // affiche dans les logs les données supplémentaires
        error_log("InfoFollowUp: Additional data: " . print_r($additionalDataTask, true));

        error_log("InfoFollowUp: Displaying follow-up view.");
        $this->mainController->FollowUp(null, $additionalDataTask);
    }

    /**
     * Calculate task data for follow-up
     */
    private function calculateTaskDataD($userId, $myHomeId): array {
        error_log("calculateTaskDataD: Calculating task data...");

        $data = [
            "labels" => [],
            "taskPercent" => [],
            "hoursHomeGlobalPerTask" => [],
            "taskCountPerYearMonth" => [],
            "taskCountPerYear" => []
        ];

        // Retrieve tasks for user and home
        $userTasks = $this->taskManager->getTasksByUserId($userId);
        error_log("calculateTaskDataD: Retrieved " . count($userTasks) . " user tasks.");

        $homeTasks = $this->taskManager->getTasksByMyHomeId($myHomeId);
        error_log("calculateTaskDataD: Retrieved " . count($homeTasks) . " home tasks.");

        foreach ($userTasks as $task) {
            if (empty($task->getNameTask())) {
                error_log("calculateTaskDataD: Skipping task with empty name.: " . $task->__toString());
                continue; // Skip invalid tasks.
            }

            $taskName = $task->getNameTask();
            if (!in_array($taskName, $data["labels"])) {
                error_log("calculateTaskDataD: Adding task label: " . $taskName);
                $data["labels"][] = $taskName;
            }
            $this->updateFollowUpData($data, $task);
        }

        foreach ($homeTasks as $task) {
            if (empty($task->getNameTask())) {
                error_log("calculateTaskDataD: Skipping home task with empty name.");
                continue; // Skip invalid tasks.
            }

            $taskName = $task->getNameTask();
            if (!isset($data["hoursHomeGlobalPerTask"][$taskName])) {
                error_log("calculateTaskDataD: Initializing hours for task: " . $taskName);
                $data["hoursHomeGlobalPerTask"][$taskName] = 0;
            }

            if ($task->getDuration() !== null) {
                error_log("calculateTaskDataD: Adding duration for task: " . $taskName);
                $data["hoursHomeGlobalPerTask"][$taskName] += ($task->getDuration() / 4); // Convert to hours
            } else {
                error_log("calculateTaskDataD: Task duration is missing for task: " . $taskName);
            }
        }

        foreach ($data["labels"] as $label) {
            // Calculate percentages
            error_log("calculateTaskDataD: Calculating percentages for task: " . $label);

            $userTaskDuration = (int)$this->taskManager->getTaskDurationByUserAndName($userId, $label);
            error_log("calculateTaskDataD: User duration for task '$label': " . $userTaskDuration);

            $homeTaskDuration = (int)$this->taskManager->getTaskDurationByMyHomeAndName($myHomeId, $label);
            error_log("calculateTaskDataD: Home duration for task '$label': " . ($homeTaskDuration ?? 0));

            if ($homeTaskDuration > 0) {
                // Avoid division by zero
                error_log("calculateTaskDataD: Calculating percentage for task '$label'.");
                $data["taskPercent"][$label] = ceil(($userTaskDuration * 100) / max(1, $homeTaskDuration));
            } else {
                error_log("calculateTaskDataD: No home duration for task '$label'. Setting percentage to 0.");
                $data["taskPercent"][$label] = 0;
            }
        }

        return $data;
    }

    /**
     * Update follow-up specific data
     */
    private function updateFollowUpData(&$data, Task $task) {
        error_log("updateFollowUpData: Updating data for task.");

        // Ensure date is valid before processing
        if ($dateAdded = $task->getDateAdded()) {
            try {
                // Parse date safely
                [$year, $month] = [date('Y', strtotime($dateAdded)), date('n', strtotime($dateAdded))];
                error_log("updateFollowUpData: Parsed year/month for task date '$dateAdded': Year=$year, Month=$month.");

                if (!isset($data["taskCountPerYear"][$year][$task->getNameTask()])) {
                    error_log("updateFollowUpData: Initializing yearly count for task.");
                    $data["taskCountPerYear"][$year][$task->getNameTask()] = 0;
                }
                if (!isset($data["taskCountPerYearMonth"][$year][$month][$task->getNameTask()])) {
                    error_log("updateFollowUpData: Initializing monthly count for task.");
                    $data["taskCountPerYearMonth"][$year][$month][$task->getNameTask()] = 0;
                }

                // Increment counts
                ++$data["taskCountPerYear"][$year][$task->getNameTask()];
                ++$data["taskCountPerYearMonth"][$year][$month][$task->getNameTask()];
            } catch (Exception | ValueError | TypeError) {
                /* Log Invalid Dates*/
                error_log("updateFollowUpData: Invalid date format for task: " . $dateAdded);
            }
        } else {
            error_log("updateFollowUpData: Task date is missing.");
        }
    }


            /**
     * Update a dashboard
     * @author Théo
     */
    private function UpdateDashboard() {
        $this->PopulateDashboard();
        $this->dashboardManager->UpdateDashboard($this->dashboard);
    }

    /**
     * Set the properties of the DashBoard object
     * @author Théo
     */
    private function PopulateDashboard() {
        $idUser = $this->userManager->GetIdUserByLoginId(intval($_SESSION['IdLogin']));
        $username = $this->loginManager->GetUsernameByIdLogin(intval($_SESSION['IdLogin']));

        $this->dashboard->SetId($this->userManager->GetIdDashboardByUserId($idUser));
        $this->dashboard->SetUsername($username);
        $this->dashboard->SetIdUser($idUser);
    }
}
