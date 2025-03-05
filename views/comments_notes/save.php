<?php
// Inclure le contrôleur pour l'ajout
require_once __DIR__ . '/../../controllers/CommentNoteController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $project_id = $_POST['project_id'];
    $user_id = $_POST['user_id'];

    $commentNoteController = new CommentNoteController();
    $commentNoteController->create($comment, $project_id, $user_id);

    // Rediriger vers la liste des commentaires après l'ajout
    header('Location: list.php');
    exit;
}
?>
