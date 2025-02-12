<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php"); // Redirige vers le tableau de bord
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion de Projets</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bienvenue sur l'Application de Gestion de Projets</h1>
    <p>Connectez-vous pour accéder à votre tableau de bord.</p>
    <a href="auth/login.php">Se connecter</a> |
    <a href="auth/register.php">S'inscrire</a>
</body>
</html>
