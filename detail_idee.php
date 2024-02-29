

<?php require_once 'read.php' ?>
<!DOCTYPE html>
<div class="card">
    <?php echo $idee['utilisateur_id']; ?>
    <h2><?php echo $idee["titre"]; ?></h2>
    <span class="span"><?php echo $idee["statut"] ?></span>
    <p><?php echo $idee["description"] ?></p><br>
    <h3>Idée de l'utilisateur nº : <span><?php echo $idee["categorie_id"] ?></span> </h3>
    <div class="btn-voir">
        <a href="index.php">Retour</a> </div>
</div>