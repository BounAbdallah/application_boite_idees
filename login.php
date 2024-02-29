<?php
require_once "config.php";

// Récupération des données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['password'];

// Validation des données (à améliorer)
if (empty($email) || empty($mot_de_passe)) {
    header('Location: index.php');
    exit;
}

// Requête pour récupérer l'utilisateur
$sql = "SELECT * FROM utilisateurs WHERE email = :email";
$requete = $bdd->prepare($sql);
$requete->execute([':email' => $email]);
$utilisateur = $requete->fetch();

// Vérification du mot de passe
if (!$utilisateur || !password_verify($mot_de_passe, $utilisateur['password'])) {
    header('Location: index.php');
    exit;
} else {
    // Authentification réussie : Initialisation de la session
    session_start();
    $_SESSION['user_id'] = $utilisateur['id']; // Stockage de l'ID de l'utilisateur dans la session
    $_SESSION['user_email'] = $utilisateur['email']; // Stockage de l'email de l'utilisateur dans la session
    header('Location: accueil.php');
    exit;
}
