<?php 

session_start();
require_once "config.php";

// Vérifier si l'utilisateur est connecté en vérifiant l'existence de la session
if (!isset($_SESSION['user_id'])) {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: index.php');
    exit;
}


$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM utilisateurs WHERE id = :user_id";
$requete = $bdd->prepare($sql);
$requete->execute([':user_id' => $user_id]);
$utilisateur = $requete->fetch();



$_SESSION['utilisateur'] = $utilisateur;



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
    <?php if(isset( $_SESSION['user_id']) === isset($utilisateur['id'])) :?>
    <div class="user-name"><h3><?php echo 'Bienvenue'." ".$utilisateur['nom']  ?></h3> <div class="deconnexion"><span><a href="deconnexion.php">Se deconnecter</a></span></div>  </div>
    <?php unset($_SESSION['utilisateur'])?>
    <?php endif;?>
</div>


<?php





?>

<?php 
$requete = $bdd->prepare("SELECT * FROM `categories` ");
$requete->execute();
$libelle_categorie = ":libelle";


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
        <div class="add-categories">
        <div class="ajouter">
           <p><a href="ajout_categori.php">Ajouter une categorie !</a></p>
        </div>
        </div>
    </div>
    
<?php 
$requete = $bdd->prepare("SELECT * FROM `idees` ");

$requete->execute();
$id = ":id";
$statut = ":statut";
$titre = ":titre"; 
$description = ":description";
$id_utilisateur = ":itilisateur_id";
$categorie_id = ":categorie_id";

?>
<div class="proposition">
  <?php while ($row = $requete->fetch(PDO::FETCH_ASSOC)) :?>
  <div class="card">
    <?php echo $row['id'];?>

      <h2><?php echo $row["titre"]; ?></h2>
      <span class="span"><?php echo $row["statut"] ?></span>
      <p><?php echo $row["description"] ?></p><br>
      <!-- <h3>idée de l'utilisateur nº : <span><</span> </h3> -->
      <!-- <?php echo $row["id"] ?> -->
      <div class="btn-voir">
        <?php  $id = $row['id']; ?>
      <a href="detail_idee.php?id=<?php echo $id ?>">Voir</a>
      </div>
</div>
<?php endwhile?>

</div>
</section>
</body>
</html>
