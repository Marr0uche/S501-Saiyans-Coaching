<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mon Profil</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<h1 class="text-center mb-4">Profil de <?= esc($client['prenom']) ?> <?= esc($client['nom']) ?></h1>

		<?php if (session()->getFlashdata('success')): ?>
			<div class="alert alert-success" role="alert">
				<?= session()->getFlashdata('success') ?>
			</div>
		<?php endif; ?>
		<?php if (session()->getFlashdata('error')): ?>
			<div class="alert alert-danger" role="alert">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>

		<form action="<?= base_url('/profile/modifier') ?>" method="post" class="row g-3">
			<div class="col-md-6">
				<label for="nom" class="form-label">Nom</label>
				<input type="text" name="nom" class="form-control" value="<?= esc($client['nom']) ?>" required>
			</div>
			<div class="col-md-6">
				<label for="prenom" class="form-label">Prénom</label>
				<input type="text" name="prenom" class="form-control" value="<?= esc($client['prenom']) ?>" required>
			</div>
			<div class="col-md-6">
				<label for="mail" class="form-label">Email</label>
				<input type="email" name="mail" class="form-control" value="<?= esc($client['mail']) ?>" required>
			</div>
			<div class="col-md-6">
				<label for="mobile" class="form-label">Mobile</label>
				<input type="text" name="mobile" class="form-control" value="<?= esc($client['mobile']) ?>" required>
			</div>
			<div class="col-md-6">
				<label for="sexe" class="form-label">Sexe</label>
				<input type="text" class="form-control" value="<?= esc($client['sexe']) ?>" disabled>
			</div>
			<div class="col-md-6">
				<label for="taille" class="form-label">Taille (en cm)</label>
				<input type="number" step="0.1" name="taille" class="form-control" value="<?= esc($client['taille']) ?>" required>
			</div>
			<div class="col-md-6">
				<label for="poidsdecorps" class="form-label">Poids (en kg)</label>
				<input type="number" step="0.1" name="poidsdecorps" class="form-control" value="<?= esc($client['poidsdecorps']) ?>" required>
			</div>
			<div class="col-md-6">
				<label for="datenaissance" class="form-label">Date de naissance</label>
				<input type="date" name="datenaissance" class="form-control" value="<?= esc($client['datenaissance']) ?>" disabled>
			</div>
			<div class="col-md-12">
				<label for="motdepasse" class="form-label">Changer de mot de passe</label>
				<input type="password" name="motdepasse" class="form-control">
			</div>
			<div class="col-12 text-center mt-4">
				<button type="submit" class="btn btn-primary">Mettre à jour</button>
			</div>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>