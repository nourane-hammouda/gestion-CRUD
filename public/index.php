<?php
// Activer l'affichage des erreurs pour le développement
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Charger les configurations et les classes nécessaires
require_once 'config/config.php';
require_once 'config/config.inc.php';

// Initialiser la connexion PDO
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password'); // Remplacez par vos paramètres de connexion

// Inclusions des contrôleurs
require_once 'controllers/ProjectController.php';
require_once 'controllers/TaskController.php';
require_once 'controllers/UserController.php'; // et autres contrôleurs si nécessaire

// Récupérer l'URL de la requête
$url = $_SERVER["REQUEST_URI"] ?? "/";

// Traiter l'URL et rediriger vers le bon contrôleur et la bonne action
switch ($url) {
    // Page d'accueil ou tableau de bord
    case '/':
    case '/index.php':
        $projectController = new ProjectController($pdo); // Passer l'objet PDO au contrôleur
        $projectController->listProjects(); // Méthode existante pour lister les projets
        break;

    // Page d'ajout de tâche
    case '/tasks/add.php':
        $taskController = new TaskController($pdo); // Passer l'objet PDO au contrôleur
        $taskController->add(); // Méthode pour afficher le formulaire d'ajout de tâche
        break;

    // Liste des tâches
    case '/tasks/list.php':
        $taskController = new TaskController($pdo); // Passer l'objet PDO au contrôleur
        $taskController->listTasks(); // Méthode pour afficher la liste des tâches
        break;

    // Authentification (login, register, etc.)
    case '/login.php':
        $userController = new UserController($pdo); // Passer l'objet PDO au contrôleur
        $userController->loginPage(); // Méthode pour afficher la page de connexion
        break;

    // Page d'ajout de projet
    case '/projects/add.php':
        $projectController = new ProjectController($pdo); // Passer l'objet PDO au contrôleur
        $projectController->addProject($name, $description); // Assurez-vous d'envoyer les bonnes données pour ajouter un projet
        break;

    // Page d'index des projets
    case '/projects/list.php':
        $projectController = new ProjectController($pdo); // Passer l'objet PDO au contrôleur
        $projectController->listProjects(); // Utilisez listProjects() au lieu de list()
        break;

    // Page par défaut en cas de route non trouvée
    default:
        echo "Page non trouvée.";
        break;
}
?>

