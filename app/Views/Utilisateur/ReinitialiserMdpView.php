<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Réinitialisation du mot de passe</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<div class="container mt-5">
		<h2 class="text-center">Réinitialisation du mot de passe</h2>

		<?php if (session()->getFlashdata('error')): ?>
			<div class="alert alert-danger">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>
		<?php if (session()->getFlashdata('success')): ?>
			<div class="alert alert-success">
				<?= session()->getFlashdata('success') ?>
			</div>
		<?php endif; ?>

		<form action="<?= site_url('mdp-oublie/reinitialiser') ?>" method="POST">
			<?= csrf_field() ?>
			<input type="hidden" name="token" value="<?= esc($token) ?>">
			<div class="form-group">
				<label for="password">Nouveau mot de passe</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Nouveau mot de passe" required>
			</div>
			<div class="form-group">
				<label for="password_confirm">Confirmer le mot de passe</label>
				<input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirmer le mot de passe" required>
			</div>
			<button type="submit" class="btn btn-primary mt-3">Réinitialiser</button>
		</form>
	</div>
</body>

</html>