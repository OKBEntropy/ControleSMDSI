<?php
session_start();
require 'connexion.php';

// Récupérer les données du formulaire
$nom = trim($_POST['nom']);
$email = trim($_POST['email']);

// Insérer dans la base
try {
    $stmt = $pdo->prepare("INSERT INTO inscrits (nom, email) VALUES (?, ?)");
    $stmt->execute([$nom, $email]);

    // Stocker le dernier prénom dans la session
    $_SESSION['dernier_prenom'] = $nom;
    $_SESSION['message'] = 'Votre message a bien été envoyé !';
    $_SESSION['message_type'] = 'success';
} catch (PDOException $e) {
    if ($e->getCode() == 23000) { // email déjà utilisé
        $_SESSION['message'] = 'Cet email est déjà utilisé !';
    } else {
        $_SESSION['message'] = 'Erreur : ' . $e->getMessage();
    }
    $_SESSION['message_type'] = 'error';
}

// Rediriger vers la page d'accueil
header('Location: index.php');
exit();
