<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/produit.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/navbaraccueil.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/footer.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php echo view('elements/NavbarAccueil', ['promotions' => $promotion]); ?>

    <section class="offers">
        <h1>Nos offres :</h1>
    </section>

    <section class="wrapper">
        <?php if (!empty($produits)): ?>
            <?php foreach ($produits as $produit): ?>
                <div class="pricing-table gprice-single">
                    <div class="head">
                        <h4 class="title"><?= esc($produit['titreproduit']); ?></h4>
                    </div>
                    <div class="content">
                        <div class="price">
                            <h1> <?= esc($produit['prix']); ?> €</h1>
                        </div>

                        <div class="periodicity" style="--order: 0;">
                            <p>Tous les mois</p>
                        </div>
                        <div class="infos" style="--order: 1;">
                            <p class="p-infos"><?= esc($produit['valabilite']); ?><?= esc($produit['prix']); ?>
                                €/mois </p>
                        </div>
                        <div class="validity" style="--order: 2;">
                            <p class="p-validity">Valable <?= esc($produit['valabilite']); ?> mois</p>
                        </div>

                        <div class="sign-up">
                            <a href="/produit/unique/<?= urlencode($produit['idproduit']); ?>"
                                class="btn bordered radius">SÉLECTIONNER</a>
                        </div>



                        <div class="footer-produit">
                            <ul>
                                <li>-Programmes 100% personnalisés</li>
                                <li class="li-marg-top">-Audios et Vidéos</li>
                                <li class="li-marg-top">-Programme alimentaire 100% personnalisé</li>
                                <li class="li-marg-top">-Bilans bi-mensuel et mensuel</li>
                                <li class="li-marg-top end">-Accès WatsApp 24/7</li>

                            </ul>

                            <div class="img">
                                <?php if ($produit['photoproduit']): ?>
                                    <img class="imgProduit" src="<?= base_url('uploads/' . $produit['photoproduit']); ?>" alt="">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
    <!--
    <div class="container">
        <div id="infoCarousel" class="carousel">
            <div class="carousel-inner">
                <?php if (!empty($promotion)):
                    foreach ($promotion as $promo): ?>
                        <div class="carousel-item">
                            <h5><?= esc($promo['reductionpromo']); ?></h5>
                            <h5><?= esc($promo['codepromo']); ?></h5>
                            <div class="carousel-caption">
                                <h5><?= esc($promo['titredocument']); ?></h5>
                                <p><?= esc($promo['descriptiondocument']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="carousel-controls">
                <button class="carousel-button" onclick="prevSlide()">❮</button>
                <button class="carousel-button" onclick="nextSlide()">❯</button>
            </div>
        </div>
    </div>-->


    <?php echo view('elements/Footer'); ?>
</body>

</html>