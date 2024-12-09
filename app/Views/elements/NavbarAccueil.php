<header>
    <nav class="navbar">
        <div class="logo">
            <a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
                    width="80px"></a>
        </div>
        <ul class="links">
            <li><a href="#">Accueil</a></li>
            <li><a href="/A_propos">À propos</a></li>
            <li><a href="/Produit">Programmes</a></li>
            <li><a href="#">Avant / Après</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/actualites">Actualité</a></li>
            <li><a href="/contact">FAQ/Contact</a></li>
        </ul>

        <div class="buttons">
            <?php
            $session = session();
            $client = $session->get('client_id');
            if ($client === null) {
                ?>
                <a href="authentification" class="action-button">Connexion</a>
                <?php
            } else {
                ?>
                <a href="/profile" class="action-button">Mon compte</a>
                <?php
            }
            ?>
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
                <?php
                $session = session();
                $client = $session->get('client_id');
                if ($client === null) {
                    ?>
                    <a href="authentification" class="action-button">Connexion</a>
                    <?php
                } else {
                    ?>
                    <a href="/profile" class="action-button">Mon compte</a>
                    <?php
                }
                ?>

            </div>
        </ul>

    </div>

    <div id="infoCarousel" class="carousel">
        <div class="carousel-inner">
            <?php if (!empty($promotion)):
                foreach ($promotion as $promo): ?>
                    <div class="carousel-item">
						<pre class="promo-pre">
							<?= esc($promo['reductionpromo']); ?>%     <?= esc($promo['codepromo']); ?>     <?= esc($promo['titredocument']); ?>
						</pre>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
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


    let currentSlide = 0;

    function showSlide(index) {
        const slidesCar = document.querySelectorAll('.carousel-item');
        const totalSlides = slidesCar.length;
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

    // Change slide every 5 seconds
    setInterval(() => {
        nextSlide();
    }, 5000);
</script>