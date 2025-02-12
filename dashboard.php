<?php
require 'auth/auth_check.php'; // Vérifie si l'utilisateur est connecté
require 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/dashboard.js" defer></script>
</head>
<body>
    <h1>Tableau de Bord</h1>
    <p>Bienvenue, <?php echo $_SESSION['username']; ?> !</p>
    <a href="auth/logout.php">Se déconnecter</a>

    <h2>Statistiques</h2>
    <div id="stats">
        <p>Projets en cours : <span id="activeProjects">0</span></p>
        <p>Tâches en attente : <span id="pendingTasks">0</span></p>
        <p>Total des employés : <span id="totalEmployees">0</span></p>
    </div>

    <h2>Liste des Projets</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date limite</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody id="projectsTableBody">
            <!-- Rempli dynamiquement avec AJAX -->
        </tbody>
    </table>
</body>
</html>
