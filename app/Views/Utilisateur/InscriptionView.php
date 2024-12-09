<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscription</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/Connexion.css'); ?>">
</head>

<body>
	<nav class="navbar">
		<div class="logo">
			<a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan" width="80px"></a>
		</div>
	</nav>

	<div class="container">
		<h2 class="text-center">Page d'Inscription</h2>
		<h5 class="text-center mb-4">Tous les champs sont obligatoires</h5>

		<?php if (session()->getFlashdata('error')): ?>
			<div class="alert alert-danger">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>

		<form action="<?= site_url('inscription/creer') ?>" method="POST">
			<?= csrf_field() ?>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="nom">Nom</label>
					<input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
				</div>
				<div class="form-group col-md-6">
					<label for="prenom">Prénom</label>
					<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="mail">Email</label>
					<input type="email" class="form-control" id="mail" name="mail" placeholder="Entrez votre email" required>
				</div>
				<div class="form-group col-md-6">
					<label for="motdepasse">Mot de passe</label>
					<input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Entrez votre mot de passe" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="mobile">Mobile</label>
					<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Entrez votre numéro de mobile" required>
				</div>
				<div class="form-group col-md-6">
					<label for="sexe">Sexe</label>
					<select class="form-control" id="sexe" name="sexe" required>
						<option value="Homme">Homme</option>
						<option value="Femme">Femme</option>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="datenaissance">Date de naissance</label>
					<input type="date" class="form-control" id="datenaissance" name="datenaissance" required>
				</div>
				<div class="form-group col-md-3">
					<label for="taille">Taille (cm)</label>
					<input type="number" class="form-control" id="taille" name="taille" placeholder="Taille" required>
				</div>
				<div class="form-group col-md-3">
					<label for="poidsdecorps">Poids (kg)</label>
					<input type="number" class="form-control" id="poidsdecorps" name="poidsdecorps" placeholder="Poids" required>
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
		</form>
	</div>
</body>

</html>
