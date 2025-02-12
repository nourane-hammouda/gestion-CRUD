<?php
require '../includes/db.php';
require 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $email = trim($_POST['email']);
    
    // Vérification des mots de passe
    if ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Préparer et exécuter la requête d'insertion dans la base de données
        $stmt = $conn->prepare("INSERT INTO authentication (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $email);
        
        if ($stmt->execute()) {
            // Redirection vers la page de connexion après inscription réussie
            header("Location: login.php");
            exit;
        } else {
            $error = "Une erreur est survenue. Veuillez réessayer.";
        }
    }
}

// Inclure le fichier HTML pour le formulaire d'inscription
include 'formulaire_inscription.html';
?>
