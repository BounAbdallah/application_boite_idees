<?php

require_once "config.php";

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validation des données (à améliorer)
if (empty($nom) || empty($email) || empty($password)) {
    header('Location: sinscrire.php');
    exit;
}

// Hachage du mot de passe
$password_hache = password_hash($password, PASSWORD_DEFAULT);

// Insertion dans la base de données
$sql = "INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (:nom,:prenom, :email, :password)";
$requete = $bdd->prepare($sql);
$requete->execute([
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':email' => $email,
    ':password' => $password_hache,
]);

// Message de confirmation
header('Location: index.php');



