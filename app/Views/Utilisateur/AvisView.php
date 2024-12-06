<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modifier un Avis</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<h1>Modifier un Avis</h1>

		<?php if (!empty($message)): ?>
			<div class="alert <?= strpos($message, 'succès') !== false ? 'alert-success' : 'alert-danger' ?>">
				<?= esc($message) ?>
			</div>
		<?php endif; ?>

		<form method="post" action="<?= site_url('avis/modifier/' . $idProduit) ?>">
			<?= csrf_field() ?>
			<div class="mb-3">
				<label for="avis" class="form-label">Votre Avis</label>
				<textarea class="form-control" id="avis" name="avis" rows="5" required></textarea>
			</div>
			<div class="mb-3">
				<label for="note" class="form-label">Note</label>
				<select class="form-select" id="note" name="note" required>
					<option value="1">1 - Très mauvais</option>
					<option value="2">2 - Mauvais</option>
					<option value="3">3 - Moyen</option>
					<option value="4">4 - Bon</option>
					<option value="5">5 - Excellent</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Donner son avis</button>
		</form>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>