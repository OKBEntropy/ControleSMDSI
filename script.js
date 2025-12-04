document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contactForm");
  const messageDiv = document.getElementById("message");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Récupérer les champs depuis le formulaire
    const nom = document.getElementById("nom").value.trim(); // Changé 'name' en 'nom'
    const email = document.getElementById("email").value.trim();

    // Valider l'email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!email || !emailRegex.test(email) || !nom) {
      messageDiv.textContent = "Vos informations ne sont pas correctes";
      messageDiv.className = "message error";
      return;
    }

    // Si tout est valide, afficher le message de succès
    messageDiv.textContent = "Votre message a bien été envoyé !";
    messageDiv.className = "message success";

    // Réinitialiser le formulaire
    form.reset();
  });
});
