<?php
require_once "config.php";

// Récupérer l'ID de l'idée à afficher depuis l'URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Vérifier si l'ID est valide
if (!$id) {
    echo "ID d'idée non spécifié.";
    exit;
}

try {
    // Préparer et exécuter la requête pour récupérer les détails de l'idée
    $requete = $bdd->prepare("SELECT * FROM idees WHERE id = $id");
    $requete->execute([':id' => $id]);

    // Vérifier si une idée correspondant à l'ID est trouvée
    if (!$requete->rowCount()) {
        echo "Aucune idée trouvée avec l'ID spécifié.";
        exit;
    }

    // Afficher les détails de l'idée
    while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Détails de l'idée</title>
        </head>
        <body>
            <h2>Détails de l'idée</h2>
            <div class="card">
                <h2><?php echo $row["titre"]; ?></h2>
                <span class="span"><?php echo $row["statut"] ?></span>
                <p><?php echo $row["description"] ?></p><br>
                <h3>Idée de l'utilisateur nº : <span><?php echo $row["id"] ?></span> </h3>
            </div>
        </body>
        </html>
        <?php
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
