<?php
require_once __DIR__ . '/../Views/View.php';
/**
 * Class MainController
 * @package Controllers
 * @author Théo Cornu
 */
class MainController {
    private $viewData = [];

    public function __construct() {
        $this->viewData = $this->initializeViewData();
    }

    /**
     * Generic method to display a view
     * @param string $viewName
     * @param array $additionalData
     */
    private function displayView(string $viewName, array $additionalData = []) {
        $view = new View($viewName);
        $data = array_merge($this->viewData, $additionalData);
        $view->generer($data);
    }

    /**
     * Displays the index page.
     * @param string|null $message
     */
    public function Index($message = null) {
        $this->displayView("Index", ["message" => $message]);
    }

    /**
     * Displays the search page.
     */
    public function Search() {
        $this->displayView("Search");
    }

    /**
     * Displays the connection page.
     */
    public function Connection() {
        $this->displayView("Connection");
    }

    /**
     * Displays the registration page.
     */
    public function Registration() {
        $this->displayView("Registration");
    }

    /**
     * Displays the dashboard page.
     */
    public function DashBoard($message = null, $idLastTask = null, $nameLastTask = null, $durationLastTask = null, $dateLastTask = null) {
        $taskData = $this->calculateTaskDataD();
        $tasksJson = file_get_contents(__DIR__ . '/../Public/data/tasks.json');
        $tasksData = json_decode($tasksJson, true);

        $additionalData = [
            "message" => $message,
            "idLastTask" => $idLastTask,
            "nameLastTask" => $nameLastTask,
            "durationLastTaskhours" => floor($durationLastTask * 15 / 60),
            "durationLastTaskminutes" => ($durationLastTask * 15) % 60,
            "dateLastTask" => $dateLastTask,
            "labels" => $taskData["labels"],
            "data1" => $taskData["data1"],
            "data2" => $taskData["data2"],
            "tasks" => $tasksData['tasks']
        ];
        $this->displayView("DashBoard", $additionalData);
    }


    /**
     * Displays the reference page.
     */
    public function Reference(): void
    {
        $tasksJson = file_get_contents(__DIR__ . '/../Public/data/tasks.json');
        $tasksData = json_decode($tasksJson, true);

        $this->displayView("Reference", [
            'tasks' => $tasksData['tasks']
        ]);
    }



    /**
     * Displays various policy and legal pages.
     */
    public function CookiePolicy(): void
    {
        $this->displayView("CookiePolicy");
    }

    public function LegalNotice(): void
    {
        $this->displayView("LegalNotice");
    }

    public function PrivacyPolicy(): void
    {
        $this->displayView("PrivacyPolicy");
    }

    public function TermsConditions(): void
    {
        $this->displayView("TermsConditions");
    }

    /**
     * Displays the MyHome page.
     */
    public function MyHome() {
        $this->displayView("MyHome");
    }

    /**
     * Displays the MyHomeRegistration page.
     */
    public function MyHomeRegistration() {
        $this->displayView("MyHomeRegistration");
    }

    public function ExportPDF($message = null) {
        $this->displayView("ExportPDF", ["message" => $message]);
    }



    /**
     * Initializes common view data
     * @return array
     */
    private function initializeViewData() : array {
        $response = $this->getResponse();
        return [
            "prop" => $response[1],
            "imagePath" => $response[2]
        ];
    }

    /**
     * Displays the Follow up page
     * @author Enzo
     * @param string|null $message
     */
    public function FollowUp($message = null, $additionalDataTask = null): void
    {
        if ($additionalDataTask) {

            $additionalData = [
                "message" => $message,
                "tasks" => $additionalDataTask['tasks'],
                "taskCountPerYear" => $additionalDataTask["taskCountPerYear"],
                "taskCountPerYearMonth" => $additionalDataTask["taskCountPerYearMonth"],
                "taskPercent" => $additionalDataTask["taskPercent"],
                "hoursHomeGlobalPerTask" => $additionalDataTask["hoursHomeGlobalPerTask"],
                "labels" => $additionalDataTask["labels"]
            ];
            $this->displayView("FollowUp", $additionalData);
        }
        else{
            $taskData = $this->calculateTaskDataD(true);
            $tasksJson = file_get_contents(__DIR__ . '/../Public/data/tasks.json');
            $taskData = json_decode($tasksJson, true);

            $additionalData = [
                "message" => $message,
                "tasks" => $taskData['tasks'],
                "taskCountPerYear" => $taskData["taskCountPerYear"],
                "taskCountPerYearMonth" => $taskData["taskCountPerYearMonth"],
                "taskPercent" => $taskData["taskPercent"],
                "hoursHomeGlobalPerTask" => $taskData["hoursHomeGlobalPerTask"],
                "labels" => $taskData["labels"],
            ];
            $this->displayView("FollowUp", $additionalData);
        }

    }


    /**
     * Updates follow-up specific data
     * @param array &$data
     * @param object $task
     */
    private function updateFollowUpData(&$data, $task) {
        $taskName = $task->getNameTask();
        $taskDate = $task->getDateAdded();
        $year = date('Y', strtotime($taskDate));
        $month = date('n', strtotime($taskDate));

        if (!isset($data["taskCountPerYear"][$year][$taskName])) {
            $data["taskCountPerYear"][$year][$taskName] = 1;
        } else {
            $data["taskCountPerYear"][$year][$taskName]++;
        }

        if (!isset($data["taskCountPerYearMonth"][$year][$month][$taskName])) {
            $data["taskCountPerYearMonth"][$year][$month][$taskName] = 1;
        } else {
            $data["taskCountPerYearMonth"][$year][$month][$taskName]++;
        }
    }
    /**
     * Calculates the task data for the dashboard and follow-up.
     * @param bool $isFollowUp
     * @return array
     */
    private function calculateTaskDataD(bool $isFollowUp = false): array
    {
        $data = [
            "labels" => [],
            "data1" => [],
            "data2" => [],
            "taskDurations" => [],
            "taskCounts" => [],
            "taskPercent" => [],
            "hoursHomeGlobalPerTask" => [],
            "taskCountPerYearMonth" => [],
            "taskCountPerYear" => []
        ];

        if (!isset($_SESSION['tasks'])) {
            return $data;
        }

        $totalDuration = 0;
        foreach ($_SESSION['tasks'] as $task) {
            $taskName = $task->getNameTask();
            $taskDuration = $task->getDuration();
            $totalDuration += $taskDuration;

            if (!in_array($taskName, $data["labels"])) {
                $data["labels"][] = $taskName;
                $data["taskDurations"][$taskName] = $taskDuration;
                $data["taskCounts"][$taskName] = 1;
            } else {
                $data["taskDurations"][$taskName] += $taskDuration;
                $data["taskCounts"][$taskName]++;
            }

            if ($isFollowUp) {
                $this->updateFollowUpData($data, $task);
            }
        }

        foreach ($data["labels"] as $label) {
            $data["data1"][] = $data["taskDurations"][$label];
            $data["data2"][] = $data["taskDurations"][$label] / $data["taskCounts"][$label];

            if ($isFollowUp) {
                $data["taskPercent"][$label] = ceil(($data["taskDurations"][$label] * 100) / $totalDuration);
                $data["hoursHomeGlobalPerTask"][$label] = round($data["taskDurations"][$label] / 4);
            }
        }

        return $data;
    }

    /**
     * Displays the response of the companion
     * @author Theo Cornu
     * @author Theo Deguin
     * @author Lola Cohidon
     */
    private function getResponse() : array{
        $durationC = 0;
        $imagePath = "Public/image/companion/companion1.png";
        $prop = "";
        $affiche = array();

        if (isset($_SESSION['IdLogin'])) {
            switch ($_GET['action']) {
                case 'Index':
                    $prop = "You're on the Homepage. Explore information about the website, its usage, and read customer reviews here.";
                    $imagePath = "Public/image/companion/companion5.png";
                    break;
                case 'ConnectLogin':
                    $prop = "You have just logged into your account. Welcome or welcome back among us.";
                    break;
                case 'InfoDashBoard':
                    if ((isset($_SESSION['tasks'])) && ((end($_SESSION['tasks']))->getId() != null)) {
                        $currentDateT = new DateTime();
                        $currentDate = $currentDateT->format('Y-m-d');
                        $lastTaskDate = end($_SESSION['tasks'])->getDateAdded();
                        $lastTaskDateD = strtotime($lastTaskDate);
                        $currentDateD = strtotime($currentDate);
                        $oneWeekAgo = strtotime("-1 week", $currentDateD);
                        foreach ($_SESSION['tasks'] as $task) {
                            $durationC += $task->getDuration();
                        }
                        if ($lastTaskDateD <= $oneWeekAgo) {
                            $prop = "It seems you haven't recorded any tasks in a week or more. Consider updating your task log to stay organized.";
                            $imagePath = "Public/image/companion/companion7.png";
                        } elseif ($durationC >= 8) {
                            $prop = "You've accomplished quite a few tasks this week. Great job!";
                            $imagePath = "Public/image/companion/companion4.png";
                        } elseif ($durationC <= 4) {
                            $prop = "It seems like you haven't completed enough tasks this week. Consider taking on a few more to stay on track.";
                            $imagePath = "Public/image/companion/companion6.png";
                        } else {
                            $prop = "It looks like you've completed a decent number of tasks this week. Keep it up!";
                            $imagePath = "Public/image/companion/companion8.png";
                        }
                    } else {
                        $prop = "You're on the dashboard page. Here, you can view information about tasks completed in the last week.";
                    }
                    break;
                case 'Reference':
                    $prop = "You're on the Reference page. Here, you can check the value reference for each possible task.";
                    break;
                case 'Registration':
                    $prop = "You're on the Update My Account page. Here, you can modify the information associated with your account.";
                    break;
                case 'TaskRegistration':
                    $prop = "You've just added a completed task to the dashboard.";
                    $imagePath = "Public/image/companion/companion2.png";
                    break;
                case 'TaskSupression':
                    if (!isset($_SESSION['tasks']) || (end($_SESSION['tasks']))->getId() == null) {
                        $prop = "Unable to delete tasks as there are currently none recorded.";
                    } else {
                        $prop = "You've just removed the last added task.";
                    }
                    break;
                case 'TaskModification':
                    if (!isset($_SESSION['tasks']) || (end($_SESSION['tasks']))->getId() == null) {
                        $prop = "Unable to modify tasks as there are currently none recorded.";
                    } else {
                        $prop = "You've just modified the last added task.";
                    }
                    break;
                case 'InfoFollowUp':
                    $prop = "You are on the Follow Up page. Here, you can access information about task tracking.";
                    break;
                case 'AddUser&':
                    $prop = "You've just created a new account. Welcome to Family'Easy!";
                    break;
                default:
                    $prop = 'Ouaf ouaf';
                    break;
            }
        } else {
            switch ($_GET['action']) {
                case 'Index':
                    $prop = "Welcome to Family'Easy, your new tool for household task management. You're on the homepage. Explore information about the website, its usage, and read customer reviews here.";
                    $imagePath = "Public/image/companion/companion5.png";
                    break;
                case 'Connection':
                    $prop = "You're on the Login page. Sign in here to access your account.";
                    break;
                case 'Registration':
                    $prop = "You're on the Registration page. Create your account here to get started.";
                    break;
                default:
                    $prop = 'Ouaf ouaf';
                    break;
            }
        }

        $affiche[1] = $prop;
        $affiche[2] = $imagePath;
        return $affiche;
    }
}