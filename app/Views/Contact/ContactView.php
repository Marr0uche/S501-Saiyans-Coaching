<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Saiyans Coaching</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

	<style>
		button,
		.btn {
			background-color: yellow !important;
			color: black !important;
			border: none;
		}

		button:hover,
		.btn:hover {
			background-color: black !important;
			color: yellow !important;
		}

		img {
			width: 20%;
			height: auto;
			border-radius: 10px;
		}
	</style>
</head>

<body>
	<nav class="navbar">
            <div class="logo">
                <a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
                        width="80px"></a>
            </div>
	</na>
	<section class="container my-5">
		<h2 class="text-center mb-4">FAQ - Questions Fréquentes</h2>
		<div class="accordion" id="faqAccordion">

			<div class="accordion-item">
				<h2 class="accordion-header" id="faqHeading1">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
						Quels services proposez-vous ?
					</button>
				</h2>
				<div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
					<div class="accordion-body">
						Nous proposons des services de coaching sportif personnalisés, incluant des programmes d'entraînement, des conseils nutritionnels et des suivis adaptés à vos besoins.
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="faqHeading2">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
						Quels sont vos horaires de coaching ?
					</button>
				</h2>
				<div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
					<div class="accordion-body">
						Je peux m'adapter à vos horaires, je sersia joignable par whatsapp !
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="faqHeading3">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
						Quels sont vos tarifs pour une séance ou un abonnement mensuel ?
					</button>
				</h2>
				<div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
					<div class="accordion-body">
						Nos tarifs varient en fonction du type de programme choisi et de la durée du suivi. Regardez notre page produits pour en savoir plus!
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
</body>

</html>


