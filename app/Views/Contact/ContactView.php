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
	<?php echo view('elements/Navbar'); ?>
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
		document.addEventListener("DOMContentLoaded", function() {
			const accordionButtons = document.querySelectorAll(".accordion-button");

			accordionButtons.forEach(button => {
				button.addEventListener("click", function() {
					const target = document.querySelector(this.dataset.target);
					const isOpen = target.classList.contains("show");

					document.querySelectorAll(".accordion-collapse").forEach(collapse => {
						collapse.classList.remove("show");
						collapse.style.maxHeight = null;
					});

					document.querySelectorAll(".accordion-button").forEach(btn => {
						btn.classList.remove("active");
					});

					if (!isOpen) {
						target.classList.add("show");
						target.style.maxHeight = target.scrollHeight + "px";
						this.classList.add("active");
					}
				});
			});
		});
	</script>

</body>

</html>