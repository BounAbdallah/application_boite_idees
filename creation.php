<?php


require_once "config.php";


$titre = "";
$description = "";
$categorie_id = "";
$errors = []; 
$libelle = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Valider le formulaire
    $titre = trim($_POST['titre']);
    $description = trim($_POST['description']);
    $categorie_id = (int) $_POST['categorie_id']; 

    if (empty($errors)) {
        header('Location: create.php');
    }
        try {
            $requete = $bdd->prepare("INSERT INTO `idees` (titre, description, categorie_id) VALUES (:titre, :description, :categorie_id)"); 
            $requete->execute([
                ':titre' => $titre,
                ':description' => $description,
                ':categorie_id' => $categorie_id,
            ]);
            header('Location: accueil.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = "Erreur lors de l'enregistrement de l'idée : " . $e->getMessage();
        }
    }


// Retrieve category options
$requete = $bdd->prepare("SELECT * FROM `categories` ");
$requete->execute();
$categories = $requete->fetchAll(PDO::FETCH_ASSOC);


