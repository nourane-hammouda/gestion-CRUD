<?php
require '../includes/db.php';

$id = $_GET['id']; // Récupération de l'ID dans l'URL

// Vérifier si la tâche existe
$result = $conn->query("SELECT * FROM tasks WHERE id = $id");
$task = $result->fetch_assoc();

if (!$task) {
    die("Tâche introuvable.");
}

// Récupérer les projets pour l’assignation des tâches
$projects = $conn->query("SELECT id, name FROM projects");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $project_id = $_POST['project_id'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];

    $stmt = $conn->prepare("UPDATE tasks SET name=?, project_id=?, status=?, due_date=? WHERE id=?");
    $stmt->bind_param("sissi", $name, $project_id, $status, $due_date, $id);
    $stmt->execute();

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une tâche</title>
</head>
<body>
    <h2>Modifier une tâche</h2>
    <form method="POST">
        <label>Nom:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($task['name']) ?>" required>

        <label>Projet:</label>
        <select name="project_id" required>
            <?php while ($project = $projects->fetch_assoc()): ?>
                <option value="<?= $project['id'] ?>" <?= $task['project_id'] == $project['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($project['name']) ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Statut:</label>
        <select name="status">
            <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : '' ?>>En attente</option>
            <option value="ongoing" <?= $task['status'] == 'ongoing' ? 'selected' : '' ?>>En cours</option>
            <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : '' ?>>Terminé</option>
        </select>

        <label>Date d'échéance:</label>
        <input type="date" name="due_date" value="<?= $task['due_date'] ?>" required>

        <button type="submit">Modifier</button>
    </form>
    <a href="index.php">Retour</a>
</body>
</html>
