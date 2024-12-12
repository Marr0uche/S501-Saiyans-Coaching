<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AvantApres.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/footer.css'); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
		integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Page avant après</title>

</head>

<body>
	<?php echo view('elements/Navbar'); ?>

	<main>
		<h1 style="text-align: center; padding: 16px;"><span style="color:#F4E904;">Avant</span> / <span
				style="color:#F4E904;">Après</span></h1>

		<div class="container-txt">
			<div class="row">
				<div class="col-md-6">
					<div class="about-content">
						<p>Vous êtes sur le point de découvrir les incroyables transformations de personnes qui ont fait
							confiance à Saiyan's Coaching.<br><br>

							Ces clichés avant/après mettent en lumière des membres de notre équipe, des individus comme
							vous
							qui ont décidé de prendre en main leur santé et leur forme physique.<br><br>

							Ces images sont bien plus qu'une simple métamorphose physique.<br><br>

							Elles représentent le dévouement, la persévérance et la confiance de ceux qui ont osé
							entreprendre ce voyage vers un meilleur mode de vie. Chaque transformation incarne le
							pouvoir de
							l'investissement dans sa santé pour se sentir mieux, être plus fort et vivre
							pleinement.<br><br>

							Il ne tient qu'à vous de faire le premier pas vers une version améliorée de vous-même.
							Rejoignez
							la communauté Saiyan's Coaching et explorez les possibilités pour atteindre vos objectifs de
							santé et de bien-être. Vous méritez de vous sentir bien dans votre peau. Laissez ces photos
							vous
							inspirer à investir dans votre santé pour un physique et une vie meilleure.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="image-grid">
			<img src="/assets/img/imgAvantApres/carousse2.png" alt="Image 2">
			<img src="/assets/img/imgAvantApres/carousse1.png" alt="Image 1">
			<img src="/assets/img/imgAvantApres/carousse3.png" alt="Image 3">
			<img src="/assets/img/imgAvantApres/carousse4.png" alt="Image 4">
			<img src="/assets/img/imgAvantApres/carousse6.png" alt="Image 6">
			<img src="/assets/img/imgAvantApres/carousse5.png" alt="Image 5">
			<img src="/assets/img/imgAvantApres/carousse8.png" alt="Image 8">
			<img src="/assets/img/imgAvantApres/carousse7.png" alt="Image 7">
			<img src="/assets/img/imgAvantApres/carousse9.png" alt="Image 9">
			<img src="/assets/img/imgAvantApres/carousse14.png" alt="Image 14">
			<img src="/assets/img/imgAvantApres/carousse11.png" alt="Image 11">
			<img src="/assets/img/imgAvantApres/carousse13.png" alt="Image 13">
			<img src="/assets/img/imgAvantApres/carousse10.png" alt="Image 10">
			<img src="/assets/img/imgAvantApres/carousse12.png" alt="Image 12">
			<img src="/assets/img/imgAvantApres/carousse15.png" alt="Image 15">

		</div>

		<div class="modal" id="imageModal">
			<img src="" alt="Expanded View" id="modalImage">
		</div>
	</main>

	<?php echo view('elements/Footer'); ?>

	<script>
		const modal = document.getElementById('imageModal');
		const modalImage = document.getElementById('modalImage');
		const images = document.querySelectorAll('.image-grid img');

		images.forEach(image => {
			image.addEventListener('click', () => {
				modalImage.src = image.src;
				modal.classList.add('active');
			});
		});

		modal.addEventListener('click', () => {
			modal.classList.remove('active');
		});
	</script>
</body>

</html>