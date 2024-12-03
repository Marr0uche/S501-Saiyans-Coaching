<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscription</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<h2 class="text-center mt-5">Page d'Inscription</h2>

		<?php if (session()->getFlashdata('error')): ?>
			<div class="alert alert-danger">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>

		<form action="<?= site_url('inscription/creer') ?>" method="POST">
			<?= csrf_field() ?>
			<div class="form-group">
				<label for="nom">Nom</label>
				<input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
			</div>
			<div class="form-group">
				<label for="prenom">Prénom</label>
				<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
			</div>
			<div class="form-group">
				<label for="mail">Email</label>
				<input type="mail" class="form-control" id="mail" name="mail" placeholder="Entrez votre email" required>
			</div>
			<div class="form-group">
				<label for="motdepasse">Mot de passe</label>
				<input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Entrez votre mot de passe" required>
			</div>
			<div class="form-group">
				<label for="mobile">Mobile</label>
				<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Entrez votre numéro de mobile" required>
			</div>
			<div class="form-group">
				<label for="sexe">Sexe</label>
				<select class="form-control" id="sexe" name="sexe" required>
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				</select>
			</div>
			<div class="form-group">
				<label for="age">Âge</label>
				<input type="number" class="form-control" id="age" name="age" placeholder="Entrez votre âge" required>
			</div>
			<div class="form-group">
				<label for="taille">Taille (cm)</label>
				<input type="number" class="form-control" id="taille" name="taille" placeholder="Entrez votre taille" required>
			</div>
			<div class="form-group">
				<label for="poidsdecorps">Poids</label>
				<input type="number" class="form-control" id="poidsdecorps" name="poidsdecorps" placeholder="Entrez votre poids" required>
			</div>
			<button type="submit" class="btn btn-primary">S'inscrire</button>
		</form>
	</div>
</body>

</html>