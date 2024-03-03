<?php 
require_once 'config.php';
// Initialisation de la variable d'erreurs
$errors = [];

// Traitement du formulaire
if (isset($_POST['libelle'])) {

    // Nettoyage de la saisie
    $libelle = trim($_POST['libelle']);

    // Validation de la saisie
    if (empty($libelle)) {
        $errors[] = "Le champ 'Libellé' est obligatoire.";
    }

    // Enregistrement de la catégorie
    if (empty($errors)) {
        try {
            $requete = $bdd->prepare("INSERT INTO categories (libelle) VALUES (:libelle)");
            $requete->execute([
                ':libelle' => $libelle,
            ]);

            // Redirection vers la page d'accueil
            header('Location: accueil.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = "Erreur lors de l'enregistrement de la catégorie : " . $e->getMessage();
        }
    }
}
