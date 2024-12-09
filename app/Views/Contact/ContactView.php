<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Saiyans Coaching</title>


	<link rel="stylesheet" href="<?php echo base_url('assets/css/contact.css'); ?>">
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
		<section class="container my-5">
			<h2 class="text-center mb-4 h2-1">FAQ - Questions Fréquentes</h2>
			<div class="accordion" id="faqAccordion">
				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button active" type="button" data-target="#faqCollapse1">
							Quels services proposez-vous ?
						</button>
					</h2>
					<div id="faqCollapse1" class="accordion-collapse show">
						<div class="accordion-body">
							Nous proposons des services de coaching sportif personnalisés, incluant des programmes
							d'entraînement, des conseils nutritionnels et des suivis adaptés à vos besoins.
						</div>
					</div>
				</div>

				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button" type="button" data-target="#faqCollapse2">
							Quels sont vos horaires de coaching ?
						</button>
					</h2>
					<div id="faqCollapse2" class="accordion-collapse">
						<div class="accordion-body">
							Je peux m'adapter à vos horaires, je serais joignable par WhatsApp !
						</div>
					</div>
				</div>

				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button" type="button" data-target="#faqCollapse3">
							Quels sont vos tarifs pour une séance ou un abonnement mensuel ?
						</button>
					</h2>
					<div id="faqCollapse3" class="accordion-collapse">
						<div class="accordion-body">
							Nos tarifs varient en fonction du type de programme choisi et de la durée du suivi. Regardez
							notre page produits pour en savoir plus !
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="container my-5">
			<h2 class="text-center mb-4">Contactez-nous</h2>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<?php echo form_open('contact/send', ['class' => 'needs-validation', 'novalidate' => true]); ?>

					<div class="mb-3">
						<?php
						echo form_label('Nom', 'nom', ['class' => 'form-label']);
						echo form_input('nom', set_value('nom'), [
							'class' => 'form-control',
							'id' => 'nom',
							'placeholder' => 'Votre nom',
							'required' => true
						]);
						echo validation_show_error('nom');
						?>
					</div>

					<div class="mb-3">
						<?php
						echo form_label('Adresse e-mail', 'email', ['class' => 'form-label']);
						echo form_input([
							'type' => 'email',
							'name' => 'email',
							'id' => 'email',
							'value' => set_value('email'),
							'class' => 'form-control',
							'placeholder' => 'Votre adresse e-mail',
							'required' => true
						]);
						echo validation_show_error('email');
						?>
					</div>

					<div class="mb-3">
						<?php
						echo form_label('Téléphone', 'telephone', ['class' => 'form-label']);
						echo form_input([
							'type' => 'tel',
							'name' => 'telephone',
							'id' => 'telephone',
							'value' => set_value('telephone'),
							'class' => 'form-control',
							'placeholder' => 'Votre numéro de téléphone',
							'required' => true
						]);
						echo validation_show_error('telephone');
						?>

					</div>

					<div class="mb-3">
						<?php
						echo form_label('Message', 'message', ['class' => 'form-label']);
						echo form_textarea([
							'name' => 'message',
							'id' => 'message',
							'class' => 'form-control',
							'placeholder' => 'Votre message',
							'rows' => 5,
							'required' => true
						], set_value('message'));
						echo validation_show_error('message');
						?>
					</div>

					<div class="text-center">
						<?php echo form_submit('submit', 'Envoyer', ['class' => 'btn']); ?>
					</div>

					<?php echo form_close(); ?>
				</div>
			</div>
		</section>

	</main>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const accordionButtons = document.querySelectorAll(".accordion-button");

			accordionButtons.forEach(button => {
				button.addEventListener("click", function () {
					const target = document.querySelector(this.dataset.target);
					const isOpen = target.classList.contains("show");

					// Close all accordions
					document.querySelectorAll(".accordion-collapse").forEach(collapse => {
						collapse.classList.remove("show");
						collapse.style.maxHeight = null; // Réinitialise la max-height
					});

					// Remove active state from all buttons
					document.querySelectorAll(".accordion-button").forEach(btn => {
						btn.classList.remove("active");
					});

					// Open the current accordion if it wasn't already open
					if (!isOpen) {
						target.classList.add("show");
						target.style.maxHeight = target.scrollHeight + "px"; // Donne la hauteur totale du contenu
						this.classList.add("active");
					}
				});
			});
		});


	</script>

</body>

</html>