<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modification article</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/modifarticle.css') ?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/footer.css'); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
		integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

	<?php echo view('elements/Navbar'); ?>

	<h1>Modification</h1>
	<?= form_open_multipart('blog/edition'); ?>

	<?= form_hidden('iddocument', $article['iddocument']); ?>

	<div class="form-section">
		<?= form_label('Titre:', 'titredocument'); ?>
		<?= form_input('titredocument', set_value('titredocument', $article['titredocument']), ['required' => true]); ?>
		<div class="error"><?= validation_show_error('titredocument') ?></div>
	</div>

	<div class="form-section">
		<?= form_label('Contenu :', 'descriptiondocument'); ?>
		<?= form_textarea('descriptiondocument', set_value('descriptiondocument', $article['descriptiondocument'])); ?>
		<div class="error"><?= validation_show_error('descriptiondocument') ?></div>
	</div>

	<?php if (!empty($article['image'])): ?>
		<?php $imagePath = base_url('uploads/' . $article['image']); ?>
		<div class="form-section">
			<p>Image actuelle :</p>
			<img src="<?= $imagePath ?>" alt="" class="imageact">
		</div>

		<div class="checkbox-group">
			<label>
				<input type="checkbox" name="supprimer_image" value="1">
				Supprimer l'image existante
			</label>
		</div>
	<?php endif; ?>

	<div class="form-section">
		<?= form_label('Nouvelle image (facultative):', 'image'); ?>
		<?= form_upload('image', '', ['id' => 'image']); ?>
		<div class="error"><?= validation_show_error('image') ?></div>
	</div>

	<div class="form-section">
		<?= form_submit('submit', 'Modifier l\'article', ['class' => 'btn']); ?>
	</div>

	<?= form_close(); ?>

	<?php echo view('elements/Footer'); ?>
</body>

</html>