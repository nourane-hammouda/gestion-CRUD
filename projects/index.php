<?php
require '../includes/db.php';

$result = $conn->query("SELECT * FROM projects");
?>
<h2>Liste des projets</h2>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Statut</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td><?= htmlspecialchars($row['deadline']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Modifier</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Supprimer ce projet ?')">Supprimer</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
