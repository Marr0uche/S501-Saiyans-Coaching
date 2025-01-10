<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel = "stylesheet" href="<?php echo base_url('assets/css/Connexion.css'); ?>">	
</head>

<body>
	<nav class="navbar">
            <div class="logo">
                <a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
                        width="80px"></a>
            </div>
	</nav>
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
				<input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
			</div>
			<div class="form-group">
				<label for="motdepasse">Mot de passe</label>
				<input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Entrez votre mot de passe" required>
			</div>
			<button type="submit" class="btn btn-primary">Se connecter</button>
			<button type="submit" class="btn btn-primary" onclick="window.location='inscription'">Creer un compte</button>


		</form>
	</div>
</body>

</html>