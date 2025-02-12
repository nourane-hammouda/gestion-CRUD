<?php
require '../includes/db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE projects SET name=?, description=?, deadline=?, status=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $description, $deadline, $status, $id);
    $stmt->execute();
    header("Location: index.php");
}

$result = $conn->query("SELECT * FROM projects WHERE id = $id");
$project = $result->fetch_assoc();
?>
<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($project['name']) ?>" required>
    <textarea name="description"><?= htmlspecialchars($project['description']) ?></textarea>
    <input type="date" name="deadline" value="<?= $project['deadline'] ?>" required>
    <select name="status">
        <option value="ongoing" <?= $project['status'] == 'ongoing' ? 'selected' : '' ?>>En cours</option>
        <option value="completed" <?= $project['status'] == 'completed' ? 'selected' : '' ?>>Terminé</option>
        <option value="pending" <?= $project['status'] == 'pending' ? 'selected' : '' ?>>En attente</option>
    </select>
    <button type="submit">Modifier</button>
</form>
