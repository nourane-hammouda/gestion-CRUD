<h1>Ajouter une Tâche</h1>
<form action="save.php" method="POST">
    <label for="title">Titre:</label>
    <input type="text" name="title" required><br>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea><br>

    <label for="project_id">ID du projet:</label>
    <input type="number" name="project_id" required><br>

    <input type="submit" value="Ajouter">
</form>
