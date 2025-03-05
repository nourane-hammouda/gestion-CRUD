<?php
require_once __DIR__ . '/../models/Project.php';

class ProjectController {
    private $projectModel;

    public function __construct($pdo) {
        $this->projectModel = new Project($pdo);
    }

    // Liste des projets
    public function listProjects() {
        return $this->projectModel->getAllProjects();
    }

    // Ajouter un projet
    public function addProject($name, $description) {
        return $this->projectModel->addProject($name, $description);
    }

    // Modifier un projet
    public function updateProject($id, $name, $description) {
        return $this->projectModel->updateProject($id, $name, $description);
    }

    // Supprimer un projet
    public function deleteProject($id) {
        return $this->projectModel->deleteProject($id);
    }
}
?>
