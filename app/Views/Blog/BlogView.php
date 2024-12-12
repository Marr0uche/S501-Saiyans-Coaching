<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Saiyans Coaching</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/blog.css'); ?>">
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
		<h1 class="titre-blog">Blog</h1>

		<div class="container mt-3">
			<form method="get" action="">
				<div class="input-group">
					<input type="text" name="keyword" class="input-recherche-proj form-control"
						placeholder="Rechercher un mot-clé..."
						value="<?= htmlspecialchars($_GET['keyword'] ?? '', ENT_QUOTES); ?>" maxlength="30">
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
					?><img src="<?= $imagePath ?>" alt="" class="img-fluid"><?php
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
					<?= form_input('titredocument', set_value('titredocument'), ['required' => true]); ?>
					<?= validation_show_error('titredocument') ?>
				</div>
				<br>

				<div class="form-group">
					<?= form_label('Description:', 'descriptiondocument'); ?>
					<?= form_textarea('descriptiondocument', set_value('descriptiondocument'), ['required' => true]); ?>
					<?= validation_show_error('descriptiondocument') ?>
				</div>
				<br>

				<div class="form-group-img">
					<?= form_label('Image:', 'image'); ?>
					<?= form_upload('image', set_value('image')); ?>
					<?= validation_show_error('image') ?>
				</div>
				<br>

				<?= form_hidden('datepublication', date('Y-m-d H:i:s')); ?>
				<?= form_hidden('blog', 'true'); ?>

				<?= form_submit('submit', 'Ajouter l\'article'); ?>

				<?= form_close(); ?>

			</div>
		</div>
	</div>



	<?php echo view('elements/Footer'); ?>
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const openModalButtons = document.querySelectorAll('[data-modal-target]');
			const closeModalButtons = document.querySelectorAll('[data-modal-close]');
			const overlays = document.querySelectorAll('.modal-overlay');

			// Ouvrir la modale
			openModalButtons.forEach(button => {
				button.addEventListener('click', () => {
					const modal = document.querySelector(button.getAttribute('data-modal-target'));
					modal.classList.add('show'); // Affiche la modale
					document.body.style.overflow = 'hidden'; // Désactive le défilement de la page lorsque la modale est ouverte
				});
			});

			// Fermer la modale en cliquant sur le bouton de fermeture
			closeModalButtons.forEach(button => {
				button.addEventListener('click', () => {
					const modal = button.closest('.modal');
					modal.classList.remove('show'); // Masque la modale
					document.body.style.overflow = ''; // Réactive le défilement de la page
				});
			});

			// Fermer la modale en cliquant en dehors de celle-ci
			overlays.forEach(overlay => {
				overlay.addEventListener('click', (e) => {
					if (e.target === overlay) {
						overlay.classList.remove('show');
						document.body.style.overflow = ''; // Réactive le défilement de la page
					}
				});
			});
		});
	</script>

</body>


</html>