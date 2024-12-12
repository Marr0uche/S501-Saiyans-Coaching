<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Paiement</title>
	<link rel="stylesheet" href="/assets/css/paiement.css">
</head>

<body>
	<div class="page-container">
		<h2 class="text-center">Page de Paiement</h2>

		<?php if (session()->getFlashdata('error')): ?>
			<div class="alert alert-danger">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>

		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Informations sur le produit</h5>
				<p><strong>Produit : </strong><?= esc($produit['titreproduit']) ?></p>
				<p><strong>Description : </strong><?= esc($produit['descriptionproduit']) ?></p>
				<p><strong>Prix : </strong><?= $prixreel ?> €</p>

				<h5 class="mt-4">Informations sur le client</h5>
				<p><strong>Nom : </strong><?= esc($client['nom']) ?> <?= esc($client['prenom']) ?></p>
				<p><strong>Email : </strong><?= esc($client['mail']) ?></p>
			</div>
		</div>

		<a href="/achat/ajouter/<?= esc($produit['idproduit']); ?>" class="btn-buy">Payer</a>
		<a href="/Produit" class="btn-back">Retour</a>
	</div>
</body>

</html>