<?php
require 'connexion.php';

// Récupérer les données du formulaire
$nom = trim($_POST['nom']);
$email = trim($_POST['email']);

// Vérifier que ce n'est pas vide
if ($nom == "" || $email == "") {
    die("Nom ou email vide !");
}

// Insérer dans la base
try {
    $stmt = $pdo->prepare("INSERT INTO inscrits (nom, email) VALUES (?, ?)");
    $stmt->execute([$nom, $email]);
} catch (PDOException $e) {
    if ($e->getCode() == 23000) { // email déjà utilisé
        die("Cet email est déjà utilisé !");
    } else {
        die("Erreur : " . $e->getMessage());
    }
}
