<?php if ($pager): ?>
    <ul class="pagination">
        <!-- Lien vers la page précédente -->
        <?php if ($pager->hasPreviousPage()): ?>
            <li><a href="<?= $pager->getPreviousPage() ?>">Précédent</a></li>
        <?php else: ?>
            <li class="disabled"><a href="#">Précédent</a></li>
        <?php endif; ?>

        <!-- Liens vers les pages -->
        <?php foreach ($pager->links() as $link): ?>
            <li class="<?= $link['active'] ? 'active' : '' ?>">
                <a href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
            </li>
        <?php endforeach; ?>

        <!-- Lien vers la page suivante -->
        <?php if ($pager->hasNextPage()): ?>
            <li><a href="<?= $pager->getNextPage() ?>">Suivant</a></li>
        <?php else: ?>
            <li class="disabled"><a href="#">Suivant</a></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
