<?php
session_start();
require_once __DIR__ . '/../models/User.php';


class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    // Afficher la page d'inscription
    public function registerPage() {
        include 'views/auth/register.html'; // Assurez-vous que ce fichier existe
    }

    // Inscription d'un utilisateur
    public function register($name, $email, $password) {
        if (empty($name) || empty($email) || empty($password)) {
            echo "Tous les champs sont requis.";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email invalide.";
            return;
        }

        if ($this->userModel->getUserByEmail($email)) {
            echo "Cet email est déjà utilisé.";
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $this->userModel->addUser($name, $email, $hashedPassword);

        header('Location: /login.php'); // Redirection vers la connexion après inscription
        exit();
    }

    // Afficher la page de connexion
    public function loginPage() {
        include 'views/auth/login.html'; // Assurez-vous que ce fichier existe
    }

    // Connexion d'un utilisateur
    public function login($email, $password) {
        if (empty($email) || empty($password)) {
            echo "Tous les champs sont requis.";
            return;
        }

        $user = $this->userModel->getUserByEmail($email);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: /dashboard.php'); // Redirection après connexion réussie
            exit();
        } else {
            echo "Identifiants incorrects.";
        }
    }

    // Déconnexion de l'utilisateur
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /login.php'); // Redirection après déconnexion
        exit();
    }
}
?>
