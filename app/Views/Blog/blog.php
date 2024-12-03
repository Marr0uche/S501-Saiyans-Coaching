<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Saiyans Coaching</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
	<h1>Blog</h1>

	<?php foreach ($articles as $article) : ?>
		<h5 class="card-title"><?= $article['titredocument'] ?></h5>
		<p class="card-text"><?= $article['descriptiondocument'] ?></p>
	<?php endforeach; ?>

	<div class="pagination-wrapper pagination justify-content-center">
		<?= $pager->links('default', 'bootstrap') ?>
	</div>

	<a href="/blog/nouveau"> ajouter un article </a>
</body>


</html>