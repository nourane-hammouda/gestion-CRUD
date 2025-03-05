<?php
require_once __DIR__ . '/../config/config.php';

class Employee {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // CREATE : Ajouter un employé
    public function addEmployee($name, $email) {
        $sql = "INSERT INTO employees (name, email) VALUES (:name, :email)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['name' => $name, 'email' => $email]);
    }

    // READ : Récupérer tous les employés
    public function getAllEmployees() {
        $sql = "SELECT * FROM employees";
        return $this->pdo->query($sql)->fetchAll();
    }

    // UPDATE : Modifier un employé
    public function updateEmployee($id, $name, $email) {
        $sql = "UPDATE employees SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email]);
    }

    // DELETE : Supprimer un employé
    public function deleteEmployee($id) {
        $sql = "DELETE FROM employees WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
