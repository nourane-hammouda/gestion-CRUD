// Validation du formulaire (en bonus pour la partie inscription/connexion)
document.getElementById('login-form').addEventListener('submit', function (event) {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    if (username === '' || password === '') {
        alert("Tous les champs doivent être remplis");
        event.preventDefault(); // Empêche l'envoi du formulaire si vide
    }
});
// Validation du formulaire d'inscription
document.getElementById('register-form').addEventListener('submit', function (event) {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    
    // Vérifier que les champs ne sont pas vides
    if (username === '' || email === '' || password === '') {
        alert("Tous les champs doivent être remplis");
        event.preventDefault();
    }

    // Vérifier que le format de l'email est correct
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Veuillez entrer un email valide");
        event.preventDefault();
    }
});
function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.classList.add('notification', type);
    notification.innerText = message;
    
    // Ajouter la notification à la page
    document.body.appendChild(notification);

    // Supprimer la notification après 3 secondes
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Exemple d'utilisation pour afficher une notification de succès
showNotification('Projet ajouté avec succès!', 'success');

// Exemple d'utilisation pour afficher une notification d'erreur
showNotification('Erreur lors de l\'ajout du projet.', 'error');
// Filtrage de la liste des projets en fonction du texte saisi
document.getElementById('search-input').addEventListener('input', function() {
    const filter = this.value.toLowerCase(); // Le texte de recherche
    const rows = document.querySelectorAll('#projects-table tbody tr'); // Récupérer les lignes du tableau

    rows.forEach(function(row) {
        const title = row.querySelector('td').innerText.toLowerCase(); // Le titre du projet (1ère colonne)

        // Si le titre contient le texte de recherche, on affiche la ligne, sinon on la cache
        if (title.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
