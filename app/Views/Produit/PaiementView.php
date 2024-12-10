<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Paiement</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<div class="container mt-5">
		<h2 class="text-center">Page de Paiement</h2>

		<?php if (session()->getFlashdata('error')): ?>
			<div class="alert alert-danger">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>

		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Informations sur le produit</h5>
				<p><strong>Produit : </strong><?= esc($produit['TitreProduit']) ?></p>
				<p><strong>Description : </strong><?= esc($produit['descriptionProduit']) ?></p>
				<p><strong>Prix : </strong><?= number_format($produit['prix'], 2) ?> €</p>

				<h5 class="mt-4">Informations sur le client</h5>
				<p><strong>Nom : </strong><?= esc($client['nom']) ?> <?= esc($client['prenom']) ?></p>
				<p><strong>Email : </strong><?= esc($client['mail']) ?></p>
			</div>
		</div>

		<form action="<?= site_url('paiement/traiter') ?>" method="POST" class="mt-4">
			<?= csrf_field() ?>
			<button type="submit" class="btn btn-success btn-block">Payer <?= number_format($produit['prix'], 2) ?> €</button>
		</form>
	</div>
</body>

</html>