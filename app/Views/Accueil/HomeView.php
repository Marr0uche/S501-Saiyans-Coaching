<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deviens un Saiyan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
                        width="80px"></a>
            </div>
            <ul class="links">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="/Produit">Programmes</a></li>
                <li><a href="#">Avant / Après</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/actualites">Actualité</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            
            <div class="buttons">
                <a href="authentification" class="action-button">Se connecter</a>
            </div>

            <div class="menu-burger-button "><i class="fa-solid fa-bars"></i></div>
        </nav>

        <div class="menu-burger ">
            <ul class="links">
                <li class="li-responsive"><a href="#">Accueil</a></li>
                <li class="li-responsive"><a href="#">À propos</a></li>
                <li class="li-responsive"><a href="/Produit">Programmes</a></li>
                <li class="li-responsive"><a href="#">Avant / Après</a></li>
                <li class="li-responsive"><a href="/blog">Blog</a></li>
                <li class="li-responsive"><a href="/actualites">Actualité</a></li>
                <li class="li-responsive"><a href="/contact">FAQ/Contact</a></li>
                <div class="divider"></div>
                <div class="button-burger-menu">
                    <a href="authentification" class="action-button">Connexion</a>
                </div>
            </ul>

        </div>
    </header>

    <script>
        const menuBurgerButton = document.querySelector('.menu-burger-button'); // Bouton de toggle
        const menuBurger = document.querySelector('.menu-burger'); // Conteneur du menu burger

        menuBurgerButton.onclick = function () {
            menuBurger.classList.toggle('open'); // Ajoute ou retire la classe 'open'

            // Sélectionnez l'icône actuelle
            const currentIcon = menuBurgerButton.querySelector('i');
            currentIcon.classList.add('animate'); // Ajoutez la classe d'animation

            // Changez l'icône après la durée de l'animation (0.3s ici)
            setTimeout(() => {
                const isOpen = menuBurger.classList.contains('open');
                currentIcon.classList.remove('animate'); // Retirez la classe d'animation
                menuBurgerButton.innerHTML = isOpen
                    ? '<i class="fa-solid fa-xmark"></i>'
                    : '<i class="fa-solid fa-bars"></i>';
            }, 300); // Correspond à la durée définie dans le CSS
        };
    </script>



    <main>
        <section class="hero">
            <h3>SAYANS COACHING</h3>
            <h1>Entraîne-toi comme un <span class="h1-span" style="color : #F4E904;">Saiyan</span></h1>
            <p>Progresse comme un guerrier : ta transformation commence <span class="h3-span"
                    style="color : #F4E904;">aujourd'hui</span> !</p>
            <a href="#" class="btn">Commencer maintenant !</a>
            <p class="petit-txt-hero">Nous ne partagerons jamais vos informations à qui que ce soit.</p>
            <div class="container mt-5">
        </section>
       

        <section class="offers">
            <h1>Nos offres :</h1>
        </section>

        <section class="wrapper">

            <?php if (!empty($Acceuilliste)): ?>
                <?php foreach ($Acceuilliste as $produit): ?>
                    <div class="pricing-table gprice-single">
                        <div class="head">
                            <h4 class="title"><?= esc($produit['titreproduit']); ?></h4>
                        </div>
                        <div class="content">
                            <div class="price">
                                <h1> <?= esc($produit['prix']); ?> €</h1>
                            </div>
                            <div class="periodicity">
                                <p>Tous les mois</p>
                            </div>
                            <div class="infos">
                                <p class="p-infos"><?= esc($produit['valabilite']); ?> mois - <?= esc($produit['prix']); ?> €/mois </p>
                            </div>
                            <div class="validity">
                                <p class="p-validity">Valable <?= esc($produit['valabilite']); ?> mois</p>
                            </div>
                            <div class="sign-up">
                                <a href="/produit/unique/<?= urlencode($produit['idproduit']); ?>" class="btn bordered radius">SÉLECTIONNER</a>
                            </div>
                            <ul>
                                <li>-Programmes 100% personnalisés</li>
                                <li class="li-marg-top">-Audios et Vidéos</li>
                                <li class="li-marg-top">-Programme alimentaire 100% personnalisé</li>
                                <li class="li-marg-top">-Bilans bi-mensuel et mensuel</li>
                                <li class="li-marg-top end">-Accès WatsApp 24/7</li>

                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
        <a href="/questionnaire" > aller au questionnaire </a>
    </main>

    <footer>
        <p>&copy; 2023 Deviens un Saiyan. Tous droits réservés.</p>
    </footer>

</body>

</html>
