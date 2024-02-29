<?php
require_once 'config.php'; // Assuming $db connection is established in config.php

// Initialisation des variables $titre et $description
$titre = "";
$description = "";

if (isset($_GET['id']) && $_GET['id']) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM idees WHERE id = :id";

    $requete = $bdd->prepare($sql);

    $requete->bindValue(':id', $id, PDO::PARAM_INT);

    $requete->execute();
    $result = $requete->fetch();

    // Récupération des valeurs
    if ($result) {
        $titre = $result['titre'];
        $description = $result['description'];
    }
}

// Traitement du formulaire de mise à jour
if (isset($_POST['submit'])) {
    $id = strip_tags($_POST['id']);
    $titre = strip_tags($_POST['titre']);
    $description = strip_tags($_POST['description']);

    // Exécution de la requête de mise à jour
    $sql_update = "UPDATE idees SET titre = :titre, description = :description WHERE id = :id";
    $requete_update = $bdd->prepare($sql_update);
    $requete_update->bindParam(':titre', $titre, PDO::PARAM_STR);
    $requete_update->bindParam(':description', $description, PDO::PARAM_STR);
    $requete_update->bindParam(':id', $id, PDO::PARAM_INT);
    $requete_update->execute();

    // Redirection vers la page d'accueil après la mise à jour
    header('Location: accueil.php');
    exit;
}

$requete_categories = $bdd->prepare("SELECT * FROM `categories` ");
$requete_categories->execute();
$categories = $requete_categories->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="ajout_idee.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une idée</title>
</head>
<body>

<div class="form-ajouter">
    <h1>Modifier une idée</h1>
    <div class="form-ajouter2">
        <form method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="<?= $titre ?>" required>
            <br>

            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="5"><?= $description ?></textarea>

            <label for="categorie_id">Catégorie :</label>
            <select name="categorie_id" id="categorie_id" required>
                <option value="">Sélectionner une catégorie</option>
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?= $categorie['id'] ?>"><?= $categorie['libelle'] ?></option>
                <?php endforeach; ?>
            </select>

            <br>
            <button type="submit" name="submit">Valider</button>
        </form>
    </div>
</div>
</body>
</html>
