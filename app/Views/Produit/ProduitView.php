<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/produit.css'); ?>">
</head>

<body>
    <nav>
        <div class="logo">
            <a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"></a>
        </div>
    </nav>
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
    </div>

    <div class="container">
        <div class="columns-wrapper">
            <?php if (!empty($produits)):
                foreach ($produits as $produit): ?>
                    <div class="task-card" onclick="window.location='/produit/unique/<?= urlencode($produit['idproduit']); ?>'">
                        <h5 class="card-title"><?= esc($produit['titreproduit']); ?></h5>
                        <p class="card-text"><?= esc($produit['descriptionproduit']); ?></p>
                        <?php if ($produit['photoproduit']): ?>
                            <img src="<?= base_url('uploads/' . $produit['photoproduit']); ?>" alt="">
                        <?php endif; ?>
                        <p class="card-text">Prix : <?= esc($produit['prix']); ?> €</p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script>
        let currentSlide = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel-item');
            const totalSlides = slides.length;
            currentSlide = (index + totalSlides) % totalSlides;
            const offset = -currentSlide * 100;
            document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        showSlide(0); // Initial display
    </script>
</body>

</html>
