<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/produit.css'); ?>">

</head>
<body>
    <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
                        width="80px"></a>
            </div>
	</nav>
<div class="container mt-5">
    <div id="infoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">    
        <?php if (!empty($produits)): ?>
            <?php
            $first = true;

            foreach ($promotion as $promo ):
                $activeClass = $first ? ' active' : '';
                $first = false; // Marque le premier élément comme actif
            ?>
                <div class="carousel-item<?= $activeClass ?>">
                    <h5><?= esc($promo['reductionpromo'] ); ?></h5>
                    <h5><?= esc($promo['codepromo']); ?></h5>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $promo['titredocument'] ?></h5>
                        <p><?= $promo['descriptiondocument'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <!-- Contrôles du carrousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#infoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#infoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>



    <div class="container mt-4">
        <div class="row">
            <div class="columns-wrapper">
                <?php if (!empty($produits)): ?>
                    <?php foreach ($produits as $produit): ?>
                        <div class="task-card"
                            onclick="window.location='/produit/unique/<?= urlencode($produit['idproduit']); ?>'">
                            <h5 class="card-title"><?= esc($produit['titreproduit']); ?></h5>
                            <p class="card-text"><?= esc($produit['descriptionproduit']); ?></p>
                            <?php
                                $imagePath = base_url('uploads/' . $produit['photoproduit']);
                                ?><img src="<?= $imagePath ?>" alt="Image" class="img-fluid"><?php
                            ?>
                            <p class="card-text">Prix : <?= esc($produit['prix']); ?> €</p>
                        </div>
                    <?php endforeach;?>
				<?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>
