<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/StyleNavbar.css" rel="stylesheet">
    <link href="/assets/css/creerProduit.css" rel="stylesheet">
	
</head>
<body>
    <header>
        <h1>Créer un produit</h1>
    </header>

<form action="/produit/creer" method="post" enctype="multipart/form-data">
    <label for="Titre">Titre du produit :</label>
    <input type="text" id="Titre" name="Titre" value="<?= set_value('Titre') ?>" required>
    <p class="error"><?= validation_show_error('Titre') ?></p>

    <label for="descriptionproduit">Description du produit :</label>
    <textarea id="descriptionproduit" name="descriptionproduit" required><?= set_value('descriptionproduit') ?></textarea>
    <p class="error"><?= validation_show_error('descriptionproduit') ?></p>

    <label for="prix">Prix :</label>
    <input type="text" id="prix" name="prix" value="<?= set_value('prix') ?>" required>
    <p class="error"><?= validation_show_error('prix') ?></p>

    <label for="fichier">Choisir une image :</label>
    <input type="file" id="fichier" name="fichier">
    <p class="error"><?= validation_show_error('fichier') ?></p>

    <label>
        <input type="checkbox" name="dashboard" value="true" <?= set_value('dashboard') === 'true' ? 'checked' : '' ?>>
        Afficher sur le dashboard
    </label>
    <p class="error"><?= validation_show_error('dashboard') ?></p>

    <label>
        <input type="checkbox" name="Afficher" value="true" <?= set_value('Afficher') === 'true' ? 'checked' : '' ?>>
        Afficher
    </label>
    <p class="error"><?= validation_show_error('Afficher') ?></p>

    <input type="submit" value="Créer le produit">
</form>

</body>
</html>
