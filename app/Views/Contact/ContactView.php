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


