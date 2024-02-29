
<?php require_once 'creation.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="ajout_idee.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une idée</title>
</head>
<body>

<?php if (!empty($errors)) : ?>
    <div class="error-messages">
        <?php foreach ($errors as $error) : ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (isset($success)) : ?>
    <div class="success-message">
        <p><?= $success ?></p>
    </div>
<?php endif; ?>
<div class="form-ajouter">

<h1>Ajouter une idée</h1>
<div class="form-ajouter2">
<form action="creation.php" method="post">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" value="<?= $titre ?>" required>
    <br>

    <label for="description">Description :</label>
    <textarea id="description" name="description" rows="5" ><?= $description ?></textarea>

    <label for="categorie_id">Catégorie :</label>
    <select name="categorie_id" id="categorie_id" required>
        <option value="">Sélectionner une catégorie</option>
        <?php foreach ($categories as $categorie) : ?>
            <option value="<?= $categorie['id'] ?>"><?= $categorie['libelle'] ?></option>
        <?php endforeach; ?>
    </select>

    <br>
    <button type="submit">Enregistrer</button>
</form>
</div>
</div>
</body>
</html>
