<?php
// Inclure le contrôleur pour récupérer les commentaires et notes
require_once __DIR__ . '/../../controllers/CommentNoteController.php';

$commentNoteController = new CommentNoteController();
$commentsNotes = $commentNoteController->index();
?>

<h1>Liste des Commentaires et Notes</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Commentaire</th>
            <th>ID du projet</th>
            <th>ID de l'utilisateur</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($commentsNotes as $commentNote): ?>
        <tr>
            <td><?php echo $commentNote['id']; ?></td>
            <td><?php echo $commentNote['comment']; ?></td>
            <td><?php echo $commentNote['project_id']; ?></td>
            <td><?php echo $commentNote['user_id']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $commentNote['id']; ?>">Modifier</a>
                <a href="delete.php?id=<?php echo $commentNote['id']; ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="add.php">Ajouter un commentaire/note</a>
