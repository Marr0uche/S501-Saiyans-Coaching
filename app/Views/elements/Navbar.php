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
			<li class="li-responsive"><a href="#">À propos</a></li>
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
</script>