<?php
require '../includes/db.php';

$id = $_GET['id']; // Récupération de l'ID dans l'URL

// Suppression de l'employé
$conn->query("DELETE FROM employees WHERE id = $id");

header("Location: index.php");
?>
