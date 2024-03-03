<?php

$host = "localhost";
$dbname = "application_boite_idees";
$username = "root";
$password = "";

$requete = "SELECT * FROM idees";
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "tout vas bien";
    return $bdd;
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit;
};

 