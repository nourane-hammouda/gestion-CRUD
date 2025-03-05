<?php
require_once __DIR__ . '/../models/Employee.php';
require_once __DIR__ . '/../config/config.php';

class EmployeeController {
    private $employeeModel;

    public function __construct() {
        $this->employeeModel = new Employee($GLOBALS['pdo']); // Connexion DB
    }

    // Ajouter un employé
    public function create($name, $email) {
        return $this->employeeModel->addEmployee($name, $email);
    }

    // Récupérer tous les employés
    public function index() {
        return $this->employeeModel->getAllEmployees();
    }

    // Modifier un employé
    public function update($id, $name, $email) {
        return $this->employeeModel->updateEmployee($id, $name, $email);
    }

    // Supprimer un employé
    public function delete($id) {
        return $this->employeeModel->deleteEmployee($id);
    }
}


?>
