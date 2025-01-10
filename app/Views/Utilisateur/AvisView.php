<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajouter un Avis</title>
</head>

<body>
	<h1>Ajouter un Avis</h1>

	<?php if (session()->getFlashdata('error')): ?>
		<p style="color: red;"><?= session()->getFlashdata('error') ?></p>
	<?php endif; ?>

	<form method="post" action="<?= site_url('avis/ajouter/' . $idProduit) ?>">
		<label for="noteTemoignage">Note :</label>
		<input type="number" name="noteTemoignage" id="noteTemoignage" min="1" max="5" required>
		<br><br>

		<label for="avisTemoignage">Votre Avis :</label>
		<textarea name="avisTemoignage" id="avisTemoignage" rows="5" required></textarea>
		<br><br>

		<button type="submit">Envoyer</button>
	</form>
</body>

</html>