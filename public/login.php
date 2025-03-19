<?php
require_once __DIR__ . '/../controllers/UserController.php';

$userController = new UserController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($userController->login($_POST['email'], $_POST['password'])) {
        header("Location: ../views/dashboard.html");
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>
