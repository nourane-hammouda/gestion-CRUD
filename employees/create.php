<?php
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $team = $_POST['team'];

    // Préparer et exécuter la requête d'insertion dans la base de données
    $stmt = $conn->prepare("INSERT INTO employees (name, email, team) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $team);
    $stmt->execute();
    $stmt->close();

    // Redirection vers la page d'index des employés après ajout
    header("Location: index.php");
    exit;
}

// Inclure le formulaire HTML pour l'ajout d'un employé
include 'employees.html';
?>
