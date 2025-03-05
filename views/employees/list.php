<?php
// Inclure le contrôleur pour récupérer les employés
require_once __DIR__ . '/../../controllers/EmployeeController.php';

$employeeController = new EmployeeController();
$employees = $employeeController->index();
?>

<h1>Liste des Employés</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?php echo $employee['id']; ?></td>
            <td><?php echo $employee['name']; ?></td>
            <td><?php echo $employee['email']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $employee['id']; ?>">Modifier</a>
                <a href="delete.php?id=<?php echo $employee['id']; ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="add.php">Ajouter un employé</a>
