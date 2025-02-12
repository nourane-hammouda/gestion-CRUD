<?php
require '../includes/db.php';
require 'session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, password, role FROM authentication WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header("Location: ../dashboard.php");
            exit;
        } else {
            $error = "Mot de passe incorrect.";
        }
    } else {
        $error = "Nom d'utilisateur introuvable.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Nom d'utilisateur:</label>
        <input type="text" name="username" required>
        <label>Mot de passe:</label>
        <input type="password" name="password" required>
        <button type="submit">Se connecter</button>
    </form>
    <a href="register.php">Pas encore inscrit ? Inscrivez-vous</a>
</body>
</html>
