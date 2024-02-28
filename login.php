<?php

require_once "config.php";

// Récupération des données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['password'];

// Validation des données (à améliorer)
if (empty($email) || empty($mot_de_passe)) {
    header('Location: index.php');
    echo "Tous les champs sont obligatoires.";


    exit;
}

// Requête pour récupérer l'utilisateur
$sql = "SELECT * FROM utilisateurs WHERE email = :email";
$requete = $bdd->prepare($sql);
$requete->execute([':email' => $email]);
$utilisateur = $requete->fetch();

// Vérification du mot de passe
if (!$utilisateur || !password_verify($mot_de_passe, $utilisateur['password']) ) {

    header('Location: index.php');

    exit;
}else
{
    header('Location: accueil.php');
}

// Démarrage de la session
session_start();

// Stockage des informations de l'utilisateur en session
$_SESSION['utilisateur'] = $utilisateur;

// Redirection vers la page d'accueil
header('Location: accueil.php');

