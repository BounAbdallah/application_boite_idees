<?php 
session_start();
require_once "config.php";

$requete = $bdd->prepare("SELECT * FROM `utilisateurs` ");
$requete->execute();
$utilisateur= ":prenom.value";



$_SESSION['utilisateur'] = $utilisateur

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<div class="top-bar">
    <div class="site-name"><h3>App Boîte á idées </h3></div>
    <?php if (isset($_SESSION['utilisateur'])) :?>
    <div class="user-name"><h3><?php echo 'Bienvenue'.$_SESSION['utilisateur']  ?></h3></div>
    <?php unset($_SESSION['utilisateur'])?>
    <?php endif;?>
</div>
<?php
//Inclusion du fichier de configuration bdd 

// Recuperation des elements de la table 


?>

<?php 
$requete = $bdd->prepare("SELECT * FROM `categories` ");
$requete->execute();
$libelle_categorie = ":libelle"


?>

<section class="section-body">

    <div class="navigation">
        <div class="ajouter">
           <p><a href="create.php">Ajouter une idée !</a></p>
        </div>
        <div class="ajouter">
  <?php while ($row = $requete->fetch(PDO::FETCH_ASSOC)) :?>
            <p><?php echo $row['libelle'] ?></p>
<?php endwhile?>

        </div>
    </div>
    
<?php 
$requete = $bdd->prepare("SELECT * FROM `idees` ");

$requete->execute();
$id = ":id_idee";
$statut = ":statut";
$titre = ":titre"; 
$description = ":description";
$id_utilisateur = ":itilisateur_id";
$categorie_id = ":categorie_id";

?>
<div class="proposition">
  <?php while ($row = $requete->fetch(PDO::FETCH_ASSOC)) :?>
  <div class="card">
    <?php echo $row['itilisateur_id'];?>
      <h2><?php echo $row["titre"]; ?></h2>
      <span class="span"><?php echo $row["statut"] ?></span>
      <p><?php echo $row["description"] ?></p><br>
      <h3>idée de l'utilisateur nº : <span><?php echo $row["categorie_id"] ?></span> </h3>
      <div class="btn-voir">
        <a href="read.php">Voir</a>
      </div>
</div>
<?php endwhile?>

</div>
</section>
</body>
</html>