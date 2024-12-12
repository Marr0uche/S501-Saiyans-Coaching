<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/actualite.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/footer.css'); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
		integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Saiyans Coaching</title>


</head>

<body>
	<?php echo view('elements/Navbar'); ?>
	<main>
		<h1 class="titre-article">Actualitées</h1>

		<div class="container mt-3">
			<form method="get" action="">
				<div class="input-group">
					<input type="text" name="keyword" class="input-recherche-proj form-control"
						placeholder="Rechercher un mot-clé..."
						value="<?= htmlspecialchars($_GET['keyword'] ?? '', ENT_QUOTES); ?>" maxlength="100">
					<button type="submit" class="btn-recherche btn btn-primary">Rechercher</button>

					<?php
					$session = session();
					$admin = $session->get('admin');
					if ($admin === 't') {
					?>
						<button type="button" class="btn btn-primary btn-ajouter-actualite"
							data-modal-target="#ajouterArticleModal">
							Ajouter
						</button>
					<?php
					}
					?>
				</div>
			</form>
		</div>

		<div class="article-container">
			<?php

			foreach ($articles as $article): ?>
				<div class="article">
					<h2><?= $article['titredocument'] ?></h2>
					<p><?= $article['descriptiondocument'] ?></p>

					<?php if ($article['image'] != null) {
						$imagePath = base_url('uploads/' . $article['image']);
					?><img src="<?= $imagePath ?>" alt="Image" class="img-fluid"><?php
																					}
																						?>

					<p class="date">
						<?php
						$date = new DateTime($article['datepublication']);

						$formatter = new IntlDateFormatter(
							'fr_FR',
							IntlDateFormatter::LONG,
							IntlDateFormatter::NONE
						);

						echo 'Publié le : ' . $formatter->format($date);
						?>
					</p>
					<?php
					if ($admin === 't') {
					?>
						<div class="container-btn">
							<button type="button" class="btn btn-primary"
								onclick="window.location='/blog/modif/<?= urlencode($article['iddocument']); ?>'">
								Modifier
							</button>
							<a class="btn-2" href="/blog/suppression/<?= urlencode($article['iddocument']); ?>"
								onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?');">
								Supprimer
							</a>

						</div>
					<?php
					}
					?>
				</div>

			<?php endforeach; ?>
		</div>
		<div class="pagination-wrapper pagination justify-content-center">
			<?= $pager->links('default', 'bootstrap') ?>
		</div>
	</main>

	<?php echo view('elements/Footer'); ?>

	<div class="modal fade" id="ajouterArticleModal" tabindex="-1" aria-labelledby="articleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="articleModalLabel">Créer un nouvel article</h5>
					<button type="button" class="btn-close" data-modal-close aria-label="Close">&times;</button>
				</div>
				<?= form_open_multipart('blog/nouveauTraitement'); ?>

				<div class="form-group">
					<?= form_label('Titre:', 'titredocument'); ?>
					<?= form_input([
						'name' => 'titredocument',
						'id' => 'titredocument',
						'value' => set_value('titredocument'),
						'class' => 'form-control',
						'required' => true,
						'maxlength' => '100',
						'placeholder' => 'Titre de l\'article (max 100 caractères)...'
					]); ?>
					<?= validation_show_error('titredocument') ?>
				</div>

				<div class="form-group">
					<?= form_label('Contenu :', 'descriptiondocument'); ?>
					<?= form_textarea([
						'name' => 'descriptiondocument',
						'id' => 'descriptiondocument',
						'value' => set_value('descriptiondocument'),
						'class' => 'form-control',
						'rows' => 5,
						'maxlength' => '5000',
						'placeholder' => 'Contenu de l\'article (max 5000 caractères)...'
					]); ?>
					<?= validation_show_error('descriptiondocument') ?>
				</div>

				<div class="form-group-img">
					<?= form_label('Image (facultative):', 'image'); ?>
					<?= form_upload([
						'name' => 'image',
						'id' => 'image',
						'class' => 'form-control',
						'accept' => 'image/*'
					]); ?>
					<?= validation_show_error('image') ?>
				</div>


				<br>

				<?= form_hidden('datepublication', date('d/m/Y')); ?>
				<?= form_hidden('blog', 'false'); ?>

				<?= form_submit('submit', 'Ajouter l\'actualité'); ?>

				<?= form_close(); ?>

			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const openModalButtons = document.querySelectorAll('[data-modal-target]');
			const closeModalButtons = document.querySelectorAll('[data-modal-close]');
			const overlays = document.querySelectorAll('.modal');

			// Ouvrir la modale
			openModalButtons.forEach(button => {
				button.addEventListener('click', () => {
					const modal = document.querySelector(button.getAttribute('data-modal-target'));
					modal.classList.add('show'); // Affiche la modale
				});
			});

			// Fermer la modale en cliquant sur le bouton de fermeture
			closeModalButtons.forEach(button => {
				button.addEventListener('click', () => {
					const modal = button.closest('.modal');
					modal.classList.remove('show'); // Masque la modale
				});
			});

			// Fermer la modale en cliquant en dehors de celle-ci
			overlays.forEach(overlay => {
				overlay.addEventListener('click', (e) => {
					if (e.target === overlay) {
						overlay.classList.remove('show');
					}
				});
			});
		});
	</script>



</body>