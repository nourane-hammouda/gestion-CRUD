<?php
require '../includes/db.php';

$id = $_GET['id']; // Récupération de l'ID dans l'URL

// Suppression de la tâche
$conn->query("DELETE FROM tasks WHERE id = $id");

header("Location: index.php");
?>
