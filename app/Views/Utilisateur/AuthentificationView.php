<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
	<link rel="stylesheet" href="/assets/css/Connexion.css">
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

	<div class="container">
		<h2 class="text-center mt-5">Page de Connexion</h2>

		<?php if (session()->getFlashdata('error')): ?>
			<div class="alert alert-danger">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>

		<form action="<?= site_url('authentification/connexion') ?>" method="POST">
			<?= csrf_field() ?>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" maxlength="50" required>
			</div>
			<div class="form-group">
				<label for="motdepasse">Mot de passe</label>
				<input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Entrez votre mot de passe" required>
			</div>
			<button type="submit" class="btn btn-primary">Se connecter</button>
			<button type="button" class="btn-2 btn-primary" onclick="window.location='inscription'">Créer un compte</button>
		</form>

		<div class="text-center mt-3">
			<a href="<?= site_url('mdp-oublie') ?>" class="text-muted">Mot de passe oublié ?</a>
		</div>
	</div>

	<?php echo view('elements/Footer'); ?>
</body>

</html>