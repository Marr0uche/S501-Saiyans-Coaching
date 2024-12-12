<header>
	<nav class="navbar">
		<div class="logo">
			<a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
					width="80px"></a>
		</div>
		<ul class="links">
			<li><a href="/">Accueil</a></li>
			<li><a href="/A_propos">À propos</a></li>
			<li><a href="/Produit">Programmes</a></li>
			<li><a href="/avant-apres">Avant / Après</a></li>
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
			<li class="li-responsive"><a href="/">Accueil</a></li>
			<li class="li-responsive"><a href="A_propos">À propos</a></li>
			<li class="li-responsive"><a href="/Produit">Programmes</a></li>
			<li class="li-responsive"><a href="/avant-apres">Avant / Après</a></li>
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
							<?= esc($promo['reductionpromo']); ?>%  <?= esc('CODE : ' . $promo['codepromo']); ?> <?= esc($promo['titredocument']); ?>
						</pre>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</header>

<script>
	const menuBurgerButton = document.querySelector('.menu-burger-button');
	const menuBurger = document.querySelector('.menu-burger');

	menuBurgerButton.onclick = function() {
		menuBurger.classList.toggle('open');

		const currentIcon = menuBurgerButton.querySelector('i');
		currentIcon.classList.add('animate');

		setTimeout(() => {
			const isOpen = menuBurger.classList.contains('open');
			currentIcon.classList.remove('animate');
			menuBurgerButton.innerHTML = isOpen ?
				'<i class="fa-solid fa-xmark"></i>' :
				'<i class="fa-solid fa-bars"></i>';
		}, 300);
	};


	let currentSlide = 0;

	function showSlide(index) {
		const slidesCar = document.querySelectorAll('.carousel-item');
		const carouselInner = document.querySelector('.carousel-inner');
		const totalSlides = slidesCar.length;

		const slideWidth = slidesCar[0].offsetWidth;

		currentSlide = (index + totalSlides) % totalSlides;
		const offset = -currentSlide * slideWidth;

		carouselInner.style.transform = `translateX(${offset}px)`;
	}

	function prevSlide() {
		showSlide(currentSlide - 1);
	}

	function nextSlide() {
		showSlide(currentSlide + 1);
	}

	window.addEventListener('load', () => {
		showSlide(0);

		setInterval(() => {
			nextSlide();
		}, 5000);
	});

	window.addEventListener('resize', () => {
		showSlide(currentSlide);
	});
</script>