<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    
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
</body>
</html>