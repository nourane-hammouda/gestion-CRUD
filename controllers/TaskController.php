<?php
require_once __DIR__ . '/../models/Task.php';
require_once __DIR__ . '/../config/config.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task($GLOBALS['pdo']); // Connexion DB
    }

    // Ajouter une tâche
    public function create($title, $description, $project_id) {
        return $this->taskModel->addTask($title, $description, $project_id);
    }

    // Récupérer toutes les tâches
    public function index() {
        return $this->taskModel->getAllTasks();
    }

    // Modifier une tâche
    public function update($id, $title, $description) {
        return $this->taskModel->updateTask($id, $title, $description);
    }

    // Supprimer une tâche
    public function delete($id) {
        return $this->taskModel->deleteTask($id);
    }
}


?>
