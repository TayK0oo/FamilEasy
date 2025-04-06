<?php

namespace Models;

use User;
use UserManager;

class TaskService
{
    private string $dataPath;
    private string $customPath;
    private UserManager $userManager;
    public function __construct()
    {
        $this->dataPath = __DIR__ . '/../Public/data/';
        $this->customPath = $this->dataPath . 'custom/';
        $this->userManager = new UserManager();
        if (!file_exists($this->customPath)) {
            mkdir($this->customPath, 0755, true);
        }
    }

    /**
     * Ajoute une tâche personnalisée
     */
    public function addCustomTask(int $userId, array $taskData): bool
    {
        try {
            // Validation des chemins
            if (!is_writable($this->customPath)) {
                throw new \Exception("Dossier non accessible en écriture : " . $this->customPath);
            }

            $customFile = $this->customPath . $userId . '_custom.json';

            // Création du fichier si inexistant
            if (!file_exists($customFile)) {
                file_put_contents($customFile, json_encode(['tasks' => []]));
            }

            // Vérification des permissions du fichier
            if (!is_writable($customFile)) {
                throw new \Exception("Permissions insuffisantes pour : " . $customFile);
            }

            // Validation des données obligatoires
            if (empty($taskData['id']) || empty($taskData['activity']) || empty($taskData['description'])) {
                throw new \Exception("Données obligatoires manquantes");
            }

            // Génération du fichier personnalisé
            $currentData = $this->loadJsonFileIfExists($customFile);

            // Vérification des doublons
            foreach ($currentData['tasks'] as $task) {
                if ($task['id'] === $taskData['id']) {
                    throw new \Exception("Une tâche avec cet ID existe déjà");
                }
                if($taskData['image'] === ''){
                    $taskData['image'] = 'img_diy.png';
                }
            }

            // Formatage des données optionnelles
            $taskData = array_merge([
                'quarter' => 1,
                'monetary' => 0,
                'example1' => '',
                'example2' => '',
                'image' => '' // Image par défaut
            ], $taskData);

            // Ajout de la nouvelle tâche
            $currentData['tasks'][] = $taskData;

            // Sauvegarde
            file_put_contents($customFile, json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return true;

        } catch (\Exception $e) {
            error_log('Erreur addCustomTask : ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Met à jour une tâche existante
     */
    public function updateCustomTask(int $userId, string $taskId, array $newData): bool
    {
        try {
            $customFile = $this->customPath . $userId . '_custom.json';
            $currentData = $this->loadJsonFileIfExists($customFile);

            foreach ($currentData['tasks'] as &$task) {
                if ($task['id'] === $taskId) {
                    $task = array_merge($task, $newData);
                    file_put_contents($customFile, json_encode($currentData, JSON_PRETTY_PRINT));
                    return true;
                }
            }

            throw new \Exception("Tâche non trouvée");

        } catch (\Exception $e) {
            error_log('Erreur updateCustomTask : ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Supprime une tâche personnalisée
     */
    public function deleteCustomTask(int $userId, string $taskId): bool
    {
        try {
            $customFile = $this->customPath . $userId . '_custom.json';
            $currentData = $this->loadJsonFileIfExists($customFile);

            $originalCount = count($currentData['tasks']);
            $currentData['tasks'] = array_filter($currentData['tasks'],
                fn($task) => $task['id'] !== $taskId
            );

            if (count($currentData['tasks']) === $originalCount) {
                throw new \Exception("Aucune tâche supprimée");
            }

            file_put_contents($customFile, json_encode($currentData, JSON_PRETTY_PRINT));
            return true;

        } catch (\Exception $e) {
            error_log('Erreur deleteCustomTask : ' . $e->getMessage());
            return false;
        }
    }

    public function getMergedPersonTasks(string $userType, int $userId): array
    {
        try {
            // 1. Charger le fichier de base
            $baseFile = ($userType === 'enterprise') ? 'tasksEntreprise.json' : 'tasks.json';
            $baseData = $this->loadJsonFile($this->dataPath . $baseFile);

            // 2. Charger les personnalisations
            $customFile = $userId . '_custom.json';
            $customData = $this->loadJsonFileIfExists($this->customPath . $customFile);

            return $this->mergeTasks($baseData['tasks'], $customData['tasks'] ?? []);

        } catch (\Exception $e) {
            error_log('Erreur TaskService : ' . $e->getMessage());
            return [];
        }
    }

    private function loadJsonFile(string $path): array
    {
        if (!file_exists($path)) {
            throw new \Exception("Fichier JSON introuvable : $path");
        }

        $content = file_get_contents($path);
        $data = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Erreur JSON dans $path : " . json_last_error_msg());
        }

        return $data;
    }

    private function loadJsonFileIfExists(string $path): array
    {
        return file_exists($path) ? $this->loadJsonFile($path) : ['tasks' => []];
    }

    private function mergeTasks(array $baseTasks, array $customTasks): array
    {
        $indexedBase = array_column($baseTasks, null, 'id');
        $indexedCustom = array_column($customTasks, null, 'id');

        $merged = array_replace_recursive($indexedBase, $indexedCustom);
        return array_values($merged);
    }

   /**
     * Récupère toutes les tâches personnalisées d'un foyer
     */
    public function getMergedTasksForHome(int $myHomeId, User $user): array
    {
        $userType = $user->getUserType();
        error_log("getMergedTasksForHome: Starting to merge tasks for home ID $myHomeId and user type $userType.");
        try {
            // 1. Charger le fichier de base
            $baseFile = ($userType === 'enterprise') ? 'tasksEntreprise.json' : 'tasks.json';
            $baseData = $this->loadJsonFile($this->dataPath . $baseFile);
            error_log("getMergedTasksForHome: Loaded base file $baseFile.");

            // 2. Récupérer les utilisateurs du foyer
            $users = $this->userManager->getUsersByMyHomeId($myHomeId);
            error_log("getMergedTasksForHome: Retrieved " . count($users) . " users for home ID $myHomeId.");

            // 3. Charger les personnalisations de tous les utilisateurs
            $customTasks = [];
            foreach ($users as $user) {
                $userId = $this->userManager->GetIdLoginByUser($user);
                $customFile = $this->customPath . $userId . '_custom.json';

                if (file_exists($customFile)) {
                    $customData = $this->loadJsonFileIfExists($customFile);
                    $customTasks = array_merge($customTasks, $customData['tasks']);
                    error_log("getMergedTasksForHome: Loaded custom tasks for user ID $userId.");
                } else {
                    error_log("getMergedTasksForHome: No custom tasks file found for user ID $userId.");
                }
            }

            // 4. Fusionner les tâches de base et personnalisées
            $merged = $this->mergeTasks($baseData['tasks'], $customTasks);
            error_log("========================================================================");

            // Récapitulatif final
            error_log("getMergedTasksForHome: RECAP - Fusion terminée");
            error_log("getMergedTasksForHome: Type utilisateur: $userType");
            error_log("getMergedTasksForHome: Fichier de base: $baseFile");
            error_log("getMergedTasksForHome: Utilisateurs trouvés: " . count($users));
            error_log("getMergedTasksForHome: Tâches de base: " . count($baseData['tasks']));
            error_log("getMergedTasksForHome: Tâches personnalisées: " . count($customTasks));
            error_log("getMergedTasksForHome: Total tâches fusionnées: " . count($merged));
            error_log("========================================================================");

            return $merged;

        } catch (\Exception $e) {
            error_log('Erreur getMergedTasksForHome : ' . $e->getMessage());
            return [];
        }
    }

}
