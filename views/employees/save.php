<?php
// Inclure le contrôleur pour l'ajout
require_once __DIR__ . '/../../controllers/EmployeeController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $employeeController = new EmployeeController();
    $employeeController->create($name, $email);

    // Rediriger vers la liste des employés après l'ajout
    header('Location: list.php');
    exit;
}
?>
