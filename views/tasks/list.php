<?php
// Inclure le contrôleur pour récupérer les tâches
require_once __DIR__ . '/../../controllers/TaskController.php';

$taskController = new TaskController();
$tasks = $taskController->index();
?>

<h1>Liste des Tâches</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?php echo $task['id']; ?></td>
            <td><?php echo $task['title']; ?></td>
            <td><?php echo $task['description']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $task['id']; ?>">Modifier</a>
                <a href="delete.php?id=<?php echo $task['id']; ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="add.php">Ajouter une tâche</a>
