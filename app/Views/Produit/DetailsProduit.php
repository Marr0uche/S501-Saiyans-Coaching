<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste des Produits</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<style>
		/* Exemple de style CSS pour task-card */
		.task-card {
			border: 1px solid #ddd;
			border-radius: 8px;
			padding: 16px;
			margin: 8px 0;
			cursor: pointer;
			transition: background-color 0.3s;
		}
		.task-card:hover {
			background-color: #f9f9f9;
		}
	</style>
</head>

<body>

    <?php 
        use App\Models\ClientModel;

        $client  = new ClientModel();
    ?>
	<div class="container mt-4">
		<div class="row">
			<div class="columns-wrapper">
                <div class="task-card"
                    <h5 class="card-title"><?= esc($produit['titreproduit']); ?></h5>
                    <p class="card-text"><?= esc($produit['descriptionproduit']); ?></p>
                    <p class="card-text">Photo : <img src="<?= esc($produit['photoproduit']); ?>" alt="Photo du produit" style="max-width: 100%; height: auto;"></p>
                    <p class="card-text">Prix : <?= esc($produit['prix']); ?> €</p>
                </div>
                <?php if (!empty($achats)): ?>
					<?php foreach ($achats as $achat): ?>
                    <div class="task-card"
                        <h5 class="card-title"><?= esc($achat['notetemoignage']); ?></h5>
                        <p class="card-text"><?= esc($achat['datetemoignage']); ?></p>
                        <p class="card-text"><?= esc($achat['avistemoignage']); ?></p>
                    </div>
                    <?php endforeach; ?>
				<?php else: ?>
					<p class="text-muted">Aucune review n'est disponible pour ce produit</p>
				<?php endif; ?>
                </php>
                <a href="/Produit" >retour
                </a>
			</div>
		</div>
	</div>
</body>
</html>
