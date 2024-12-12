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

    <div class="page-container">
        <!-- Section produit -->
        <div class="product-card">
            <img src="<?= esc($produit['photoproduit']); ?>" alt="" class="product-image">
            <h1 class="product-title"><?= esc($produit['titreproduit']); ?></h1>
            <p class="product-description"><?= esc($produit['descriptionproduit']); ?></p>
            <?php
            $session = session();
            $promo = $session->get('codepromo');
            $prixreel = $produit['prix'];
            if ($promo): ?>
                <!-- Affichage du prix barré et du prix réduit -->
                <p class="product-price">
                    <span class="price-original"><?= esc($produit['prix']); ?> €</span>
                    <span class="price-reduced">
                        <?= $prixreel = number_format(esc($produit['prix'] - ($produit['prix'] * esc($promo['reductionpromo'] / 100))), 2, '.', ' '); ?>
                        €
                    </span>
                </p>
            <?php else: ?>
                <!-- Affichage du prix normal -->
                <p class="product-price">Prix : <?= esc($produit['prix']); ?> €</p>
            <?php endif; ?>
        </div>

        <!-- Section avis -->
        <?php if (!empty($achats)): ?>
            <div class="product-reviews">
                <h3 class="review-title">Avis des utilisateurs</h3>
                <?php foreach ($achats as $achat): ?>
                    <?php if ($achat['notetemoignage'] !== null): ?>
                        <div class="product-review">
                            <p class="review-rating">Note : <?= esc($achat['notetemoignage']); ?> ⭐</p>
                            <p class="review-date">Date : <?= esc($achat['datetemoignage']); ?></p>
                            <p class="review-text"><?= esc($achat['avistemoignage']); ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="pagination-container">
                <?= $pager->links('group_achats', 'custom_pagination') ?>
            </div>
        <?php else: ?>
            <p class="no-reviews">Aucun avis n'est disponible pour ce produit.</p>
        <?php endif; ?>

        <!-- Formulaire de code promo -->
        <?= form_open('promo/valider', ['class' => 'promo-form']); ?>
        <?= form_label('Code Promo:', 'codepromo', ['class' => 'form-label']); ?>
        <?= form_input('codepromo', set_value('codepromo'), ['class' => 'form-control']); ?>
        <?= validation_show_error('codepromo', '<div class="alert alert-danger">', '</div>'); ?>
        <?= form_submit('submit', 'Appliquer', ['class' => 'btn-submit']); ?>
        <?= form_close(); ?>

        <!-- Messages flash -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Boutons -->
        <a href="/paiement/<?= esc($produit['idproduit']); ?>/<?= urlencode($prixreel); ?>" class="btn-buy">Acheter</a>
        <a href="/Produit" class="btn-back">Retour</a>
    </div>
</body>

</html>