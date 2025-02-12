<?php
require '../includes/db.php';

// Récupérer les projets pour l’assignation des tâches
$projects = $conn->query("SELECT id, name FROM projects");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $project_id = $_POST['project_id'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];

    $stmt = $conn->prepare("INSERT INTO tasks (name, project_id, status, due_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $name, $project_id, $status, $due_date);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une tâche</title>
</head>
<body>
    <h2>Ajouter une tâche</h2>
    <form method="POST">
        <label>Nom:</label>
        <input type="text" name="name" required>

        <label>Projet:</label>
        <select name="project_id" required>
            <?php while ($project = $projects->fetch_assoc()): ?>
                <option value="<?= $project['id'] ?>"><?= htmlspecialchars($project['name']) ?></option>
            <?php endwhile; ?>
        </select>

        <label>Statut:</label>
        <select name="status">
            <option value="pending">En attente</option>
            <option value="ongoing">En cours</option>
            <option value="completed">Terminé</option>
        </select>

        <label>Date d'échéance:</label>
        <input type="date" name="due_date" required>

        <button type="submit">Ajouter</button>
    </form>
    <a href="index.php">Retour</a>
</body>
</html>
