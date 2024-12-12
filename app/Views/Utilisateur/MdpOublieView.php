<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mot de passe oublié</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<div class="container mt-5">
		<h2 class="text-center">Mot de passe oublié</h2>

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

		<form action="<?= site_url('mdp-oublie/envoyer') ?>" method="POST">
			<?= csrf_field() ?>
			<div class="form-group">
				<label for="email">Entrez votre adresse email</label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Votre email" maxlength="50" required>
			</div>
			<button type="submit" class="btn btn-primary mt-3">Envoyer</button>
		</form>
	</div>
</body>

</html>