<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Connexion / Inscription</title>
</head>
<body>
    <!-- <h1>Connexion</h1>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <br>
        <button type="submit">Se connecter</button>
    </form> -->    <div class="box-formulaire">
    <div class="titre"><h2>Connexion</h2></div>
    <div class="formulaire">
    <form action="login.php" method="POST">
        <!-- si message d'erreur on l'affiche -->
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
       
        <div class="mail_partie">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">

        </div>
        <div class="mail_partie">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn">Envoyer</button>
    </form>
    </div>
    <div class="sinscrire">
    <p> J'ai pas de compte ! <span> <a href="sinscrire.php">S'inscrire maintenant </a></span> </span>
</div>
</div>
   

   
</div>

</body>
</html>

