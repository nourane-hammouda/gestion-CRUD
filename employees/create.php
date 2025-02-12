<?php
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $team = $_POST['team'];

    $stmt = $conn->prepare("INSERT INTO employees (name, email, team) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $team);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un employé</title>
</head>
<body>
    <h2>Ajouter un employé</h2>
    <form method="POST">
        <label>Nom:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Équipe:</label>
        <input type="text" name="team">
        <button type="submit">Ajouter</button>
    </form>
    <a href="index.php">Retour</a>
</body>
</html>
