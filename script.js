document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const messageDiv = document.getElementById('message');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Récupérer les champs depuis le php
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        
        // Valider l'email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!email || !emailRegex.test(email)) {
            // Affiche le message d'erreur
            messageDiv.textContent = 'Vos informations ne sont pas correctes';
            messageDiv.className = 'message error';
            return;
        }
        
        // Si tout est valide, afficher le ok
        messageDiv.textContent = 'Votre message a bien été envoyé !';
        messageDiv.className = 'message success';
        
        // Réinitialiser le formulaire
        form.reset();
        
    });
});