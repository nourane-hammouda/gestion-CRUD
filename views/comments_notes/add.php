<h1>Ajouter un Commentaire ou Note</h1>
<form action="save.php" method="POST">
    <label for="comment">Commentaire:</label>
    <textarea name="comment" required></textarea><br>

    <label for="project_id">ID du projet:</label>
    <input type="number" name="project_id" required><br>

    <label for="user_id">ID de l'utilisateur:</label>
    <input type="number" name="user_id" required><br>

    <input type="submit" value="Ajouter">
</form>
