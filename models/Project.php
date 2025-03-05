<?php
require_once __DIR__ . '/../config/config.php';

class Project {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // CREATE : Ajouter un projet
    public function addProject($name, $description) {
        $sql = "INSERT INTO projects (name, description) VALUES (:name, :description)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['name' => $name, 'description' => $description]);
    }

    // READ : Récupérer tous les projets
    public function getAllProjects() {
        $sql = "SELECT * FROM projects";
        return $this->pdo->query($sql)->fetchAll();
    }

    // UPDATE : Modifier un projet
    public function updateProject($id, $name, $description) {
        $sql = "UPDATE projects SET name = :name, description = :description WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description]);
    }

    // DELETE : Supprimer un projet
    public function deleteProject($id) {
        $sql = "DELETE FROM projects WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
