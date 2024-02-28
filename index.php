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
</div>

    <!-- <h2>Inscription</h2>
    <form action="inscription.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>
        <br>
        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" id="prenom" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <br>
        <button type="submit">S'inscrire</button>
    </form> -->
    <div class="box-formulaire">
    <div class="titre"><h2>Inscription</h2></div>
    <div class="formulaire">
    <form action="inscription.php" method="POST">
        <!-- si message d'erreur on l'affiche -->
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <div class="mail_partie">
            <label for="email" class="form-label">Nom</label>
            <input type="name"  name="nom" placeholder="Nom">
        </div>
        <div class="mail_partie">
            <label for="email" class="form-label">Prenom</label>
            <input type="name"  name="prenom" placeholder="prenom">
        </div>
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
</div>

</body>
</html>

