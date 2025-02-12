<?php
require '../includes/db.php';

$id = $_GET['id']; // Récupération de l'ID dans l'URL

// Vérifier si l’employé existe
$result = $conn->query("SELECT * FROM employees WHERE id = $id");
$employee = $result->fetch_assoc();

if (!$employee) {
    die("Employé introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $team = $_POST['team'];

    $stmt = $conn->prepare("UPDATE employees SET name=?, email=?, team=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $team, $id);
    $stmt->execute();

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un employé</title>
</head>
<body>
    <h2>Modifier un employé</h2>
    <form method="POST">
        <label>Nom:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($employee['name']) ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($employee['email']) ?>" required>
        <label>Équipe:</label>
        <input type="text" name="team" value="<?= htmlspecialchars($employee['team']) ?>">
        <button type="submit">Modifier</button>
    </form>
    <a href="index.php">Retour</a>
</body>
</html>
