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
	<header>
	<nav class="navbar">
            <div class="logo">
                <a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
                        width="80px"></a>
            </div>
	</nav>
	</header>
	
	<h1>Blog</h1>

	<div class="container mt-3">
		<form method="get" action="">
			<div class="input-group">
				<input type="text" name="keyword" class="input-recherche-proj form-control"
					placeholder="Rechercher un mot-clé..."
					value="<?= htmlspecialchars($_GET['keyword'] ?? '', ENT_QUOTES); ?>">
				<button type="submit" class="btn-recherche btn btn-primary">Rechercher</button>
			</div>
		</form>
	</div>
	<hr>

	<?php
	$session = session();
	$admin = $session->get('admin');
	if ($admin === 't') 
	{
		?>
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterArticleModal">
			Ajouter un article
		</button>
		<?php
	}

	foreach ($articles as $article): ?>


		<h2><?= $article['titredocument'] ?></h2>
		<p><?= $article['descriptiondocument'] ?></p>

		
		<?php if($article['image'] != null)
		{
			$imagePath = base_url('uploads/' . $article['image']);
			?><img src="<?= $imagePath ?>" alt="" class="img-fluid"><?php
		}
		?>
		
		<p>
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
		if ($admin === 't') 
		{
			?>
			<button type="button" class="btn btn-primary"
			onclick="window.location='/blog/modif/<?= urlencode($article['iddocument']); ?>'">
				Modifier
			</button>
			<a href="/blog/suppression/<?= urlencode($article['iddocument']); ?>"
				onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
				<p>Supprimer</p>
			</a>
			<?php
		}

		?>
		
		
	<?php endforeach; ?>

	<div class="pagination-wrapper pagination justify-content-center">
		<?= $pager->links('default', 'bootstrap') ?>
	</div>

	<div class="modal fade" id="ajouterArticleModal" tabindex="-1" aria-labelledby="articleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="articleModalLabel">Créer un nouvel article</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?= form_open_multipart('blog/nouveauTraitement'); ?>

				<?= form_label('Titre:', 'titredocument'); ?>
				<?= form_input('titredocument', set_value('titredocument'), ['required' => true]); ?>
				<?= validation_show_error('titredocument') ?>
				<br>

				<?= form_label('Contenu :', 'descriptiondocument'); ?>
				<?= form_textarea('descriptiondocument', set_value('descriptiondocument')); ?>
				<?= validation_show_error('descriptiondocument') ?>
				<br>

				<?= form_label('Image (facultative):', 'image'); ?>
				<?= form_upload('image', '', ['id' => 'image']); ?>
				<?= validation_show_error('image') ?>
				<br>
				
				<?= form_hidden('datepublication', date('Y-m-d H:i:s')); ?>
				<?= form_hidden('blog', 'true'); ?>

				<?= form_submit('submit', 'Ajouter l\'article'); ?>

				<?= form_close(); ?>

			</div>
		</div>
	</div>
</body>


</html>