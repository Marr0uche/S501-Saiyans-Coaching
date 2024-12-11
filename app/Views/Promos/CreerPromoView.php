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
        <h1>Créer une promotion</h1>
    </header>

	<?= form_open('/promotion/creer'); ?>
    <?= form_label('Titre de la promotion : *', 'Titre'); ?>
    <?= form_input('Titre', set_value('Titre'), 'required'); ?>
    <?= validation_show_error('Titre') ?>
    <p>Le champ titre est requis</p>
    <br>

    <?= form_label('Description de la promotion : *', 'descriptiondocument'); ?>
    <?= form_textarea('descriptiondocument', set_value('descriptiondocument'), 'required'); ?>
    <?= validation_show_error('descriptiondocument') ?>


    <?= form_label('Active', 'active'); ?>
    <?= form_checkbox('active', 'true', set_value('active') === 'true'); ?>
    <?= validation_show_error('active'); ?>
    <br>


    <?= form_label('Reduction appliquer en % : *', 'reduc'); ?>
    <?= form_input('reduc', set_value('reduc'),'required'); ?>
    <?= validation_show_error('reduc') ?>
    <br>

    <?= form_label('Code Promotionnelle pour appliquer la promotion : *', 'codepromo'); ?>
    <?= form_textarea('codepromo', set_value('codepromo'), 'required'); ?>
    <?= validation_show_error('codepromo') ?>
    <br>

    <?= form_submit('submit', 'Créer la promotion'); ?>

    <?= form_close(); ?>
</body>
</html>
