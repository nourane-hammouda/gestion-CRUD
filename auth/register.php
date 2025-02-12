<?php
require '../includes/db.php';
require 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hachage du mot de passe
    $role = 'user'; // Par défaut, un utilisateur normal

    $stmt = $conn->prepare("INSERT INTO authentication (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $role);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        $error = "Erreur lors de l'inscription.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Nom d'utilisateur:</label>
        <input type="text" name="username" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Mot de passe:</label>
        <input type="password" name="password" required>
        <button type="submit">S'inscrire</button>
    </form>
    <a href="login.php">Déjà un compte ? Connectez-vous</a>
</body>
</html>
