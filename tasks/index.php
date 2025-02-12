<?php
require '../includes/db.php'; // Connexion à la base de données

$result = $conn->query("SELECT t.id, t.name, t.status, t.due_date, p.name AS project_name 
                        FROM tasks t
                        JOIN projects p ON t.project_id = p.id");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Ajoutez votre CSS -->
</head>
<body>
    <h2>Liste des tâches</h2>
    <a href="create.php">Ajouter une tâche</a>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Projet</th>
            <th>Statut</th>
            <th>Date d'échéance</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['project_name']) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td><?= htmlspecialchars($row['due_date']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Modifier</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Supprimer cette tâche ?')">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
