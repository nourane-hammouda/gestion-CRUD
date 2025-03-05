<?php
require_once '../../config/config.php';
require_once '../../controllers/ProjectController.php';

$controller = new ProjectController($pdo);
$projects = $controller->listProjects();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Projets</title>
</head>
<body>
    <h1>Liste des Projets</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($projects as $project) : ?>
            <tr>
                <td><?= htmlspecialchars($project['id']) ?></td>
                <td><?= htmlspecialchars($project['name']) ?></td>
                <td><?= htmlspecialchars($project['description']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $project['id'] ?>">Modifier</a>
                    <a href="delete.php?id=<?= $project['id'] ?>" onclick="return confirm('Supprimer ce projet ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
