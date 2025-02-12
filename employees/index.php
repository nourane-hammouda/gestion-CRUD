<?php
require '../includes/db.php'; // Connexion à la base de données

$result = $conn->query("SELECT * FROM employees");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des employés</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Ajoutez votre CSS -->
</head>
<body>
    <h2>Liste des employés</h2>
    <a href="create.php">Ajouter un employé</a>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Équipe</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['team']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Modifier</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Supprimer cet employé ?')">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
