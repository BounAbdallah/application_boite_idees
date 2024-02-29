<?php 
require_once 'config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM idees WHERE `id` = :id";
    $requete = $bdd->prepare($sql);
    $requete->bindParam(":id", $id, PDO::PARAM_INT);
    $requete->execute();

    if ($requete->rowCount() > 0) {
        header('Location: accueil.php');
        exit;
    } else {
        echo "La suppression a échoué.";
    }
}
