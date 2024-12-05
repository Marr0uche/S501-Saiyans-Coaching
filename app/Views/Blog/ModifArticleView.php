<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modification article</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img {
            width: 50%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>

<body>

	<h1> Modification </h1>
	<?= form_open_multipart('blog/edition'); ?>

	<?= form_hidden('iddocument', $article['iddocument']); ?>

	<?= form_label('Titre:', 'titredocument'); ?>
	<?= form_input('titredocument', set_value('titredocument', $article['titredocument']), ['required' => true]); ?>
	<?= validation_show_error('titredocument') ?>
	<br>

	<?= form_label('Contenu :', 'descriptiondocument'); ?>
	<?= form_textarea('descriptiondocument', set_value('descriptiondocument', $article['descriptiondocument'])); ?>
	<?= validation_show_error('descriptiondocument') ?>
	<br>

	<?php if (!empty($article['image'])): ?>
        <?php $imagePath = base_url('uploads/' . $article['image']); ?>
        <div>
            <p>Image actuelle :</p>
            <img src="<?= $imagePath ?>" alt="Image actuelle">
        </div>
        <br>

        <!-- Option pour supprimer l'image existante -->
        <div>
            <label>
                <input type="checkbox" name="supprimer_image" value="1">
                Supprimer l'image existante
            </label>
        </div>
    <?php endif; ?>

	<?= form_label('Nouvelle image (facultative):', 'image'); ?>
    <?= form_upload('image', '', ['id' => 'image']); ?>
    <?= validation_show_error('image') ?>
    <br><br>

	<?= form_submit('submit', 'Modifier l\'article', ['class' => 'btn btn-primary']); ?>


	<?= form_close(); ?>
</body>

</html>