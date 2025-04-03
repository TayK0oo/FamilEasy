<?php

namespace Models;

class TaskService
{
    private string $dataPath;
    private string $customPath;

    public function __construct()
    {
        // Chemin relatif depuis la racine du projet
        $this->dataPath = __DIR__ . '/../Public/data/';
        $this->customPath = $this->dataPath . 'custom/';

        // Création automatique du dossier custom si inexistant
        if (!file_exists($this->customPath)) {
            mkdir($this->customPath, 0755, true);
        }
    }

    public function getMergedTasks(string $userType, int $userId): array
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
}
