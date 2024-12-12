<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste des Promotions</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<style>
		.task-card {
			border: 1px solid #ddd;
			border-radius: 8px;
			padding: 16px;
			margin: 8px 0;
			cursor: pointer;
			transition: background-color 0.3s;
		}

		.task-card:hover {
			background-color: #f9f9f9;
		}
	</style>
</head>

<body>
	<div class="container mt-4">
		<div class="row">
			<div class="columns-wrapper">
				<?php if (!empty($listePromotion)): ?>
					<?php foreach ($listePromotion as $promotion): ?>
						<div class="task-card"
							<h5 class="card-title"><?= esc($promotion['titredocument']); ?></h5>
							<p class="card-text"><?= esc($promotion['descriptiondocument']); ?></p>
							<p class="card-text">reductionpromo : <?= esc($promotion['reductionpromo']); ?> %</p>
							<p class="card-text">codepromo : <?= esc($promotion['codepromo']); ?></p>
							<a href="/promotion/suppression/<?= urlencode($promotion['iddocument']); ?>" class="btnTrash"> supp</a>
							<a href="#" class="btn btn-primary"
								data-bs-toggle="modal"
								data-bs-target="#PromotionModal"
								data-id="<?= esc($promotion['iddocument']); ?>"
								data-titre="<?= esc($promotion['titredocument']); ?>"
								data-description="<?= esc($promotion['descriptiondocument']); ?>"
								data-active="<?= esc($promotion['active']); ?>"
								data-reduction="<?= esc($promotion['reductionpromo']); ?>"
								data-codepromo="<?= esc($promotion['codepromo']); ?>"
								onclick="event.stopPropagation();">
								Modifier
							</a>
						</div>
					<?php endforeach; ?>
					<a href="/promotion/ajoutview" class="btn btn-success mt-3">Ajouter une promotion</a>
				<?php else: ?>
					<p class="text-muted">Aucun produit disponible.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="modal fade" id="PromotionModal" tabindex="-1" aria-labelledby="promotionModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="promotionModalLabel">Modifier la promotion</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?= form_open('promotion/modifier'); ?>
				<?= form_hidden('idpromotion', ''); ?>

				<div class="modal-body">
					<div class="mb-3">
						<?= form_label('Titre de la promotion', 'titrepromotion', ['class' => 'form-label']); ?>
						<?= form_input([
							'name' => 'titrepromotion',
							'id' => 'titrepromotion',
							'class' => 'form-control',
							'value' => '',
							'required' => 'required',
						]); ?>
						<?= validation_show_error('titrepromotion'); ?>
					</div>

					<div class="mb-3">
						<?= form_label('Description de la Promotion', 'DescriptionPromotion', ['class' => 'form-label']); ?>
						<?= form_textarea([
							'name' => 'DescriptionPromotion',
							'id' => 'DescriptionPromotion',
							'class' => 'form-control',
							'rows' => 3,
							'value' => '',
							'required' => 'required',
						]); ?>
						<?= validation_show_error('DescriptionPromotion'); ?>
					</div>

					<div class="mb-3">
						<?= form_label('Reduction appliquer', 'reduc', ['class' => 'form-label']); ?>
						<?= form_input([
							'name' => 'reduc',
							'id' => 'reduc',
							'class' => 'form-control',
							'value' => '',
							'required' => 'required',
						]); ?>
						<?= validation_show_error('reduc'); ?>
					</div>

					<div class="mb-3">
						<?= form_label('Code Promo', 'code', ['class' => 'form-label']); ?>
						<?= form_textarea([
							'name' => 'code',
							'id' => 'code',
							'class' => 'form-control',
							'rows' => 3,
							'value' => '',
							'required' => 'required',
						]); ?>
						<?= validation_show_error('code'); ?>
					</div>

					<div class="mb-3">
						<?= form_label('Active', 'active', ['class' => 'form-label']); ?>
						<?= form_checkbox('active', 'true', false); ?>
						<?= validation_show_error('active'); ?>
						<span id="activeStatus"></span>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
						<?= form_submit('submit', 'Enregistrer', ['class' => 'btn btn-primary']); ?>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const modal = document.getElementById('PromotionModal');
			modal.addEventListener('show.bs.modal', function(event) {
				const button = event.relatedTarget;
				const id = button.getAttribute('data-id');
				const titre = button.getAttribute('data-titre');
				const description = button.getAttribute('data-description');
				const active = button.getAttribute('data-active');
				const reduc = button.getAttribute('data-reduction');
				const code = button.getAttribute('data-codepromo');

				modal.querySelector('input[name="idpromotion"]').value = id;
				modal.querySelector('input[name="titrepromotion"]').value = titre;
				modal.querySelector('textarea[name="DescriptionPromotion"]').value = description;
				modal.querySelector('input[name="reduc"]').value = reduc;
				modal.querySelector('textarea[name="code"]').value = code;

				const activeStatus = active === 't' ? 'True' : (active === 'f' ? 'False' : 'Unknown');
				const activeStatusLabel = document.getElementById('activeStatus');
				const checkbox = modal.querySelector('input[name="active"]');

				checkbox.checked = (active === 't');
			});
		});
	</script>

</body>

</html>