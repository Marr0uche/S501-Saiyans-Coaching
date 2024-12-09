<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/StyleNavbar.css" rel="stylesheet">
    <link href="/assets/css/ajout_taches.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Créer un produit</h1>
    </header>

	<?= form_open_multipart('/produit/creer', ['enctype' => 'multipart/form-data']); ?>
    <?= form_label('Titre du produit :', 'Titre'); ?>
    <?= form_input('Titre', set_value('Titre'), 'required'); ?>
    <?= validation_show_error('Titre') ?>
    <p>Le champ titre est requis</p>
    <br>

    <?= form_label('Description du produit :', 'descriptionproduit'); ?>
    <?= form_textarea('descriptionproduit', set_value('descriptionproduit'), 'required'); ?>
    <?= validation_show_error('descriptionproduit') ?>
    <br>

    <?= form_label('Prix :', 'prix'); ?>
    <?= form_input('prix', set_value('prix'),'required'); ?>
    <?= validation_show_error('prix') ?>
    <br>

    <?= form_label('Choisir une image :', 'fichier'); ?>
    <?= form_upload('fichier'); ?>
    <?= validation_show_error('fichier'); ?>
    <br>

    <?= form_label('Afficher sur le dashboard', 'dashboard'); ?>
    <?= form_checkbox('dashboard', 'true', set_value('dashboard') === 'true'); ?>
    <?= validation_show_error('dashboard'); ?>
    <br>

    <?= form_label('Afficher', 'Afficher'); ?>
    <?= form_checkbox('Afficher', 'true', set_value('Afficher') === 'true'); ?>
    <?= validation_show_error('Afficher'); ?>
    <br>

    <?= form_submit('submit', 'Créer le produit'); ?>

    <?= form_close(); ?>
</body>
</html>
