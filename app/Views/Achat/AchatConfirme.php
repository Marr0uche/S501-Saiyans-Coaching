<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirmation d'Achat</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/achatconfirme.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<script>
		// Redirect to /produit after 5 seconds
		setTimeout(function() {
			window.location.href = '/';
		}, 5000);
	</script>
</head>
<body>
	<div class="confirmation-container">
		<h1 class="hero-h1">Merci pour votre achat !</h1>
		<p class="confirmation-text">Votre commande a été confirmée avec succès.</p>
		<p class="redirect-text">Vous allez être renvoyé vers la page d'accueil dans 5 secondes...</p>
	</div>
</body>
</html>
