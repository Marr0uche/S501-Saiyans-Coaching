<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit en Détail</title>
    <link rel="stylesheet" href="/assets/css/styleProduit.css">
	<link rel="stylesheet" href="/assets/css/pagination.css">
</head>

<body>
    <?php 
        use App\Models\ClientModel;
		use Config\Pager;

        $client  = new ClientModel();
    ?>

    <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
                        width="80px"></a>
            </div>
	</nav>

    <div class="page-container">
        <!-- Section produit -->
        <div class="product-card">
            <img src="<?= esc($produit['photoproduit']); ?>" alt="Photo du produit" class="product-image">
            <h1 class="product-title"><?= esc($produit['titreproduit']); ?></h1>
            <p class="product-description"><?= esc($produit['descriptionproduit']); ?></p>
            <p class="product-price">Prix : <?= esc($produit['prix']); ?> €</p>
        </div>

        <!-- Section avis -->
        <?php if (!empty($achats)): ?>
            <div class="product-reviews">
                <h3 class="review-title">Avis des utilisateurs</h3>
                <?php foreach ($achats as $achat): ?>
                    <?php if($achat['notetemoignage'] !== null):?>
                    <div class="product-review">
                        <p class="review-rating">Note : <?= esc($achat['notetemoignage']); ?> ⭐</p>
                        <p class="review-date">Date : <?= esc($achat['datetemoignage']); ?></p>
                        <p class="review-text"><?= esc($achat['avistemoignage']); ?></p>
                    </div>
                    <?php endif;?>
                <?php endforeach; ?>
            </div>
			<div class="pagination-container">
				<?= $pager->links('group_achats', 'custom_pagination') ?>
			</div>
        <?php else: ?>
            <p class="no-reviews">Aucun avis n'est disponible pour ce produit.</p>
        <?php endif; ?>

        <!-- Bouton acheter-->
        <a href="/achat/ajouter/<?= esc($produit['idproduit']); ?>" class="btn-buy">Acheter</a>

        <!-- Bouton retour -->
        <a href="/Produit" class="btn-back">Retour</a>
    </div>
</body>

</html>
