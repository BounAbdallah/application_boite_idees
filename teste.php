<?php 
    session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php
 // Démarrer la session
    
    // Vérifier si l'utilisateur est déjà connecté, le rediriger vers la page d'accueil
    if(isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit;
    }
    
    // Vérifier si le formulaire de connexion est soumis
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once "config.php"; // Inclure le fichier de configuration de la base de données
        
        // Récupérer les données du formulaire
        $username = $_POST['email'];
        $password = $_POST['password'];
        
        // Requête SQL pour vérifier les informations d'identification de l'utilisateur
        $sql = "SELECT id_utilisateur, email, password FROM utilisateurs WHERE email = :username";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if($user && password_verify($password, $user['password'])) {
            // Authentification réussie, enregistrer l'ID de l'utilisateur dans la session
            $_SESSION['user_id'] = $user['id'];
            // Rediriger l'utilisateur vers la page d'accueil
            header("Location: index.php");
            exit;
        } else {
            // Authentification échouée, afficher un message d'erreur
            echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
        }
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="email"><br>
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>
