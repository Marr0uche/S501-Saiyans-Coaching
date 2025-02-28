<?php $pager->setSurroundCount(2); ?>
<style>
	.pagination .page-link {
		background-color: black !important;
		color: white !important;
		border: 1.5px solid white;
		font-weight: bold;
	}

	.pagination .page-link:hover {
		background-color: black !important;
		color: yellow !important;
		border-color: yellow;
	}

	.pagination .page-item.active .page-link {
		background-color: black !important;
		color: white !important;
		border-color: yellow !important;
	}
</style>

<nav aria-label="Page navigation">
	<ul class="pagination justify-content-center">
		<?php if ($pager->hasPrevious()) : ?>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="First">
					<span aria-hidden="true">&laquo;&laquo;</span>
				</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
		<?php endif; ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li class="page-item <?= $link['active'] ? 'active' : '' ?>">
				<a class="page-link" href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach; ?>

		<?php if ($pager->hasNext()) : ?>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Last">
					<span aria-hidden="true">&raquo;&raquo;</span>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</nav>