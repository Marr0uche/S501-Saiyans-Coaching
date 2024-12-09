<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deviens un Saiyan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/footer.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php echo view('elements/Navbar'); ?>



    <main>
        <section class="hero">
            <h3>SAYANS COACHING</h3>
            <h1>Entraîne-toi comme un <span class="h1-span" style="color : #F4E904;">Saiyan</span></h1>
            <p>Progresse comme un guerrier : ta transformation commence <span class="h3-span"
                    style="color : #F4E904;">aujourd'hui</span> !</p>
            <a href="/Produit" class="btn">Commencer maintenant !</a>
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
                                <p class="p-infos"><?= esc($produit['valabilite']); ?> mois - <?= esc($produit['prix']); ?>
                                    €/mois </p>
                            </div>
                            <div class="validity">
                                <p class="p-validity">Valable <?= esc($produit['valabilite']); ?> mois</p>
                            </div>
                            <div class="sign-up">
                                <a href="/produit/unique/<?= urlencode($produit['idproduit']); ?>"
                                    class="btn bordered radius">SÉLECTIONNER</a>
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

        <section class="why-not-you">
            <div class="why-not-you-wrapper">
                <div class="wrapper-content">
                    <h1>Pourquoi pas <span class="h1-span" style="color : #F4E904;">toi</span> ?</h1>
                    <p>Si toi aussi tu en as marre de te sentir mal dans ta peau, et que tu veux dire CIAO à tes
                        complexes :</p>
                    <h3>Rejoin les rangs !!!</h3>
                    <a href="/Produit" class="btn btn-why">Commencer maintenant !</a>
                    <a href="/questionnaire"> aller au questionnaire </a>
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
    <section class="wrapper-footer">
        <section class="section-infos">
            <h1>Prêt à embarquer dans cette <span class="h1-span" style="color : #F4E904;">Aventure</span>?</h1>
            <a href="/Produit" class="btn btn-lato btn-infos">Plus d'informations</a>
        </section>

        <?php echo view('elements/Footer'); ?>
    </section>

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