<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste des Produits</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/produit.css'); ?>">

</head>

<body>
	<nav class="navbar">
		<div class="logo">
			<a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
					width="80px"></a>
		</div>
	</nav>
	<div class="container mt-4">
		<div class="row">
			<div class="columns-wrapper">
				<?php if (!empty($achat)): ?>
					<?php foreach ($achat as $produit): ?>
						<div class="card mb-4">
							<div class="card-body">
								<h5 class="card-title"><?= esc($produit['titreproduit']); ?></h5>
								<p class="card-text"><?= esc($produit['descriptionproduit']); ?></p>
								<div class="product-image text-center mb-3">
									<?php
									$imagePath = base_url('uploads/' . $produit['photoproduit']);
									?>
									<img src="<?= $imagePath ?>" alt="" class="img-fluid rounded">
								</div>
								<p class="card-text-price"><strong>Prix :</strong> <?= esc($produit['prix']); ?> €</p>
							</div>

							<div class="card-footer bg-light">
								<?php
								$commentaireAssocie = array_filter($commentaire, function ($achat) use ($produit) {
									return ($achat['idproduit'] == $produit['idproduit']);
								});

								$commentaireAssocie = array_values($commentaireAssocie);
								$premierCommentaire = $commentaireAssocie[0] ?? null;
								?>

								<?php if ($premierCommentaire !== null): ?>
									<?php if ($premierCommentaire['notetemoignage'] !== null): ?>
										<div class="product-reviews mb-3">
											<h6 class="review-title text-primary">Votre Avis :</h6>
											<p class="review-rating mb-1"><strong>Note :</strong>
												<?= esc($premierCommentaire['notetemoignage']); ?> ⭐</p>
											<p class="review-date mb-1"><strong>Date :</strong>
												<?= esc($premierCommentaire['datetemoignage']); ?></p>
											<p class="review-text" onclick="showModal('<?= esc($premierCommentaire['avistemoignage']); ?>')"><strong>Commentaire :</strong>
												<?= esc($premierCommentaire['avistemoignage']); ?></p>
										</div>
										<button type="button" class="btn btn-comm btn-outline-secondary btn-sm" data-bs-toggle="modal"
											data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>"
											data-note="<?= esc($premierCommentaire['notetemoignage']); ?>"
											data-avis="<?= esc($premierCommentaire['avistemoignage']); ?>">
											Modifier votre commentaire
										</button>
									<?php else: ?>
										<button type="button" class="btn btn-comm btn-outline-secondary btn-sm" data-bs-toggle="modal"
											data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>">
											Ajouter un commentaire
										</button>

									<?php endif; ?>
								<?php else: ?>
									<p class="text-muted">Aucun commentaire pour ce produit.</p>
									<button type="button" class="btn btn-comm btn-outline-secondary btn-sm" data-bs-toggle="modal"
										data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>">
										Ajouter un commentaire
									</button>

								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div id="modal" class="modal">
		<div class="modal-content">
			<span class="close" onclick="closeModal()">&times;</span>
			<p id="modal-text"></p>
		</div>
	</div>

	<div id="ajouterAvisModal" class="custom-modal">
		<div class="custom-modal-dialog">
			<div class="custom-modal-content">
				<div class="custom-modal-header">
					<h5 class="custom-modal-title">Ajouter un Avis</h5>
					<button type="button" class="custom-modal-close">&times;</button>
				</div>
				<div class="custom-modal-body">
					<form method="post" action="/avis/ajouter/" id="formAvis">
						<div class="mb-3">
							<label for="noteTemoignage" class="form-label">Note :</label>
							<input type="number" name="noteTemoignage" id="noteTemoignage" min="1" max="5" required>
						</div>
						<div class="mb-3">
							<label for="avisTemoignage" class="form-label">Votre Avis :</label>
							<textarea name="avisTemoignage" id="avisTemoignage" rows="5" required></textarea>
						</div>
						<input type="hidden" name="idProduit" id="idProduit" value="">
						<button type="submit" class="btn-primary">Envoyer</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const modal = document.getElementById('ajouterAvisModal');
			const closeModalBtn = modal.querySelector('.custom-modal-close');
			const triggers = document.querySelectorAll('[data-bs-toggle="modal"]');

			triggers.forEach(trigger => {
				trigger.addEventListener('click', function() {
					const idProduit = this.getAttribute('data-idproduit');
					const note = this.getAttribute('data-note');
					const avis = this.getAttribute('data-avis');

					modal.querySelector('#idProduit').value = idProduit || '';
					modal.querySelector('#noteTemoignage').value = note || '';
					modal.querySelector('#avisTemoignage').value = avis || '';

					const form = document.getElementById('formAvis');
					form.setAttribute('action', '/avis/ajouter/' + idProduit);

					modal.style.display = 'flex';
				});
			});

			closeModalBtn.addEventListener('click', function() {
				modal.style.display = 'none';
			});

			modal.addEventListener('click', function(e) {
				if (e.target === modal) {
					modal.style.display = 'none';
				}
			});
		});
	</script>

	<script>
		function showModal(text) {
			const modal = document.getElementById('modal');
			const modalText = document.getElementById('modal-text');
			modalText.textContent = text;
			modal.style.display = 'flex';
		}

		function closeModal() {
			const modal = document.getElementById('modal');
			modal.style.display = 'none';
		}
	</script>

</body>

</html>