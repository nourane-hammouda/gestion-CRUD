<?php
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO projects (name, description, deadline, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $description, $deadline, $status);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>
