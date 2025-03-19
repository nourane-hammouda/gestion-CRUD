<?php
require_once __DIR__ . '/../controllers/UserController.php';

$userController = new UserController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($userController->register($_POST['name'], $_POST['email'], $_POST['password'])) {
        header("Location: login.html");
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
