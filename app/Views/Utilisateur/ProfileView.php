<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mon Profil</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css'); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
	<div class="container-profile">
		<!-- Sidebar -->
		<div class="sidebar">
			<i class="fas fa-home" onclick="window.location='/'"></i>
			<?php
			$session = session();
			if ($session->get('admin') === 't'): ?>
				<i class="fas fa-chart-line" onclick="window.location='/admin/board'"></i>
			<?php endif; ?>
			<i class="fas fa-sign-out-alt" onclick="window.location='/authentification/deconnexion'"></i> <i class="fas fa-money-check" onclick="window.location='/achat/<?= $client['idclient'] ?>'"></i>
		</div>

		<!-- Section principale -->
		<div class="profile-section">
			<h1 class="profile-title">Profil de <?= esc($client['prenom']) ?> <?= esc($client['nom']) ?></h1>

			<!-- Notifications -->
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

			<!-- Formulaire -->
			<form action="<?= base_url('/profile/modifier') ?>" method="post" class="form-profile">
				<div class="form-row">
					<label for="nom">Nom</label>
					<input type="text" name="nom" value="<?= esc($client['nom']) ?>" required>
				</div>
				<div class="form-row">
					<label for="prenom">Prénom</label>
					<input type="text" name="prenom" value="<?= esc($client['prenom']) ?>" required>
				</div>
				<div class="form-row">
					<label for="mail">Email</label>
					<input type="email" name="mail" value="<?= esc($client['mail']) ?>" required>
				</div>
				<div class="form-row">
					<label for="mobile">Mobile</label>
					<input type="text" name="mobile" value="<?= esc($client['mobile']) ?>" required>
				</div>
				<div class="form-row">
					<label for="sexe">Sexe</label>
					<input type="text" value="<?= esc($client['sexe']) ?>" disabled>
				</div>
				<div class="form-row">
					<label for="taille">Taille (en cm)</label>
					<input type="number" step="0.1" name="taille" value="<?= esc($client['taille']) ?>" required>
				</div>
				<div class="form-row">
					<label for="poidsdecorps">Poids (en kg)</label>
					<input type="number" step="0.1" name="poidsdecorps" value="<?= esc($client['poidsdecorps']) ?>" required>
				</div>
				<div class="form-row">
					<label for="datenaissance">Date de naissance</label>
					<input type="date" name="datenaissance" value="<?= esc($client['datenaissance']) ?>" disabled>
				</div>
				<div class="form-row">
					<label for="motdepasse">Changer de mot de passe</label>
					<input type="password" name="motdepasse">
				</div>
				<button type="submit" class="btn-save">Mettre à jour</button>
			</form>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>