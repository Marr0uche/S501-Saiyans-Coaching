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
                <a href="#"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
                        width="80px"></a>
            </div>
            <ul class="links">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Programmes</a></li>
                <li><a href="#">Avant / Après</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Actualité</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="buttons">
                <a href="#" class="action-button">Se connecter</a>
            </div>

            <div class="menu-burger-button "><i class="fa-solid fa-bars"></i></div>
        </nav>

        <div class="menu-burger ">
            <ul class="links">
                <li class="li-responsive"><a href="#">Accueil</a></li>
                <li class="li-responsive"><a href="#">À propos</a></li>
                <li class="li-responsive"><a href="#">Programmes</a></li>
                <li class="li-responsive"><a href="#">Avant / Après</a></li>
                <li class="li-responsive"><a href="#">Blog</a></li>
                <li class="li-responsive"><a href="#">Actualité</a></li>
                <li class="li-responsive"><a href="#">Contact</a></li>
                <div class="divider"></div>
                <div class="button-burger-menu">
                    <a href="#" class="action-button">Connexion</a>
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
        </section>

        <section class="offers">
            <h1>Nos offres :</h1>
        </section>

        <section class="wrapper offres">
            <div class="pricing-table gprice-single">
                <div class="head">
                    <h4 class="title">Saiyan-90 JOURS</h4>
                </div>
                <div class="content">
                    <div class="price">
                        <h1>189€</h1>
                    </div>
                    <div class="periodicity">
                        <p>Tous les mois</p>
                    </div>
                    <div class="infos">
                        <p class="p-infos">3 mois - 189 €/mois (ou comptant 499€ via formulaire de contact)</p>
                    </div>
                    <div class="validity">
                        <p class="p-validity">Valable 3 mois</p>
                    </div>
                    <div class="sign-up">
                        <a href="#" class="btn bordered radius">SÉLECTIONNER</a>
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




            <div class="pricing-table gprice-single">
                <div class="head">
                    <h4 class="title">Saiyan-90 JOURS</h4>
                </div>
                <div class="content">
                    <div class="price">
                        <h1>189€</h1>
                    </div>
                    <div class="periodicity">
                        <p>Tous les mois</p>
                    </div>
                    <div class="infos">
                        <p class="p-infos">3 mois - 189 €/mois (ou comptant 499€ via formulaire de contact)</p>
                    </div>
                    <div class="validity">
                        <p class="p-validity">Valable 3 mois</p>
                    </div>
                    <div class="sign-up">
                        <a href="#" class="btn bordered radius">SÉLECTIONNER</a>
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
            <div class="pricing-table gprice-single">
                <div class="head">
                    <h4 class="title">Saiyan-90 JOURS</h4>
                </div>
                <div class="content">
                    <div class="price">
                        <h1>189€</h1>
                    </div>
                    <div class="periodicity">
                        <p>Tous les mois</p>
                    </div>
                    <div class="infos">
                        <p class="p-infos">3 mois - 189 €/mois (ou comptant 499€ via formulaire de contact)</p>
                    </div>
                    <div class="validity">
                        <p class="p-validity">Valable 3 mois</p>
                    </div>
                    <div class="sign-up">
                        <a href="#" class="btn bordered radius">SÉLECTIONNER</a>
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



        </section>

        <section class="why-not-you">
            <div class="why-not-you-wrapper">
                <div class="wrapper-content">
                    <h1>Pourquoi pas <span class="h1-span" style="color : #F4E904;">toi</span> ?</h1>
                    <p>Si toi aussi tu en as marre de te sentir mal dans ta peau, et que tu veux dire CIAO à tes
                        complexes :</p>
                    <h3>Rejoin les rangs !!!</h3>
                    <a href="#" class="btn btn-why">Commencer maintenant !</a>
                </div>
            </div>
        </section>

        <section class="presentation">
            <h1> <span class="h1-span" style="color : #F4E904;">Mindset</span> et <span class="h1-span"
                    style="color : #F4E904;">skills</span></h1>
            <!-- vidéo de présentation dans img/video.mp4 -->
            <video controls class="video-presentation">
                <source src="<?php echo base_url('assets/img/video.mp4'); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>


        </section>

        <section class="caroussel">
            <div class="caroussel-slide">
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse1.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse4.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse5.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse6.png"
                    style="width: 21%;" />
            </div>
            <div class="caroussel-slide">
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse1.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse4.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse5.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse6.png"
                    style="width: 21%;" />
            </div>

            <div class="opacity"></div>


        </section>

        <section class="caroussel-2">

            <div class="caroussel-slide-2">
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse5.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse6.png"
                    style="width: 21%;" />

                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse4.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse1.png"
                    style="width: 21%;" />
            </div>

            <div class="caroussel-slide-2">
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse5.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse6.png"
                    style="width: 21%;" />

                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse4.png"
                    style="width: 21%;" />
                <img class="img-caroussel"
                    src="/assets/img/caroussel-testimonial/caroussel-testimonial-1/partie-1/carousse1.png"
                    style="width: 21%;" />
            </div>
        </section>

        <section id="content">
            <div class="slide-wrapper">
                <div class="slide">
                    <div id="slide-1" class="testimonial">
                        <blockquote>
                            Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
                        </blockquote>
                        <div></div>
                        <p>John Doe &mdash; Worcestershire, UK</p>
                    </div>
                    <div id="slide-2" class="testimonial">
                        <blockquote>
                            Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
                        </blockquote>
                        <div></div>
                        <p>John Doe &mdash; Worcestershire, UK</p>
                    </div>
                    <div id="slide-3" class="testimonial">
                        <blockquote>
                            Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
                        </blockquote>
                        <div></div>
                        <p>John Doe &mdash; Worcestershire, UK</p>
                    </div>
                    <div id="slide-4" class="testimonial">
                        <blockquote>
                            Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
                        </blockquote>
                        <div></div>
                        <p>John Doe &mdash; Worcestershire, UK</p>
                    </div>
                </div>
                <div class="slider-nav">
                    <a href="#slide-1"></a>
                    <a href="#slide-2"></a>
                    <a href="#slide-3"></a>
                    <a href="#slide-4"></a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <section class="section-infos">
            <h1>Prêt à embarquer dans cette <span class="h1-span" style="color : #F4E904;">Aventure</span>?</h1>
            <a href="#" class="btn btn-lato btn-infos">Plus d'informations</a>
        </section>
        <section class="footers">

            <div class="footer-content">
                <div class="footer-content-left">
                    <div class="social-media">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-content-right">
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Programmes</a></li>
                        <li><a href="#">Avant / Après</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Actualité</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2024 Saiyan Coaching. Tous droits réservés.</p>
            </div>
        </section>
    </footer>
</body>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const navDots = document.querySelectorAll('.slider-nav a');
        const slides = document.querySelectorAll('.slide .testimonial');

        navDots.forEach((dot, index) => {
            dot.addEventListener('click', (e) => {
                e.preventDefault(); // Empêche le comportement par défaut des ancres
                slides[index].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            });
        });

        // Ajoute une classe active pour indiquer la slide en cours
        const slideContainer = document.querySelector('.slide');
        slideContainer.addEventListener('scroll', () => {
            slides.forEach((slide, index) => {
                const rect = slide.getBoundingClientRect();
                const inView = rect.left >= 0 && rect.right <= window.innerWidth;

                navDots.forEach((dot) => dot.classList.remove('active'));
                if (inView) {
                    navDots[index].classList.add('active');
                }
            });
        });
    });

</script>

</html>