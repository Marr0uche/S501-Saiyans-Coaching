<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Mon Tableau de Bord</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center">Gestion des Produits</h1>
            <a href="/produit/ajoutview" class="btn btn-success">Ajouter un Produit</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($produits)): ?>
                        <?php foreach ($produits as $produit): ?>
                            <tr>
                                <td><?= esc($produit['idproduit']); ?></td>
                                <td>
                                    <img src="<?= esc($produit['photoproduit']); ?>" alt="Image du produit" style="width: 60px; height: auto;">
                                </td>
                                <td><?= esc($produit['titreproduit']); ?></td>
                                <td><?= esc($produit['descriptionproduit']); ?></td>
                                <td><?= esc($produit['prix']); ?> €</td>
                                <td>
                                    <a href="#" 
                                       class="btn btn-primary btn-sm"
                                       data-bs-toggle="modal" 
                                       data-bs-target="#produitModal"
                                       data-id="<?= esc($produit['idproduit']); ?>" 
                                       data-titre="<?= esc($produit['titreproduit']); ?>" 
                                       data-description="<?= esc($produit['descriptionproduit']); ?>" 
                                       data-photo="<?= esc($produit['photoproduit']); ?>" 
                                       data-prix="<?= esc($produit['prix']); ?>"
                                       onclick="event.stopPropagation();">
                                        Modifier
                                    </a>
                                    <a href="/produit/suppression/<?= urlencode($produit['idproduit']); ?>" 
                                       class="btn btn-danger btn-sm">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Aucun produit disponible.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal pour modification -->
    <div class="modal fade" id="produitModal" tabindex="-1" aria-labelledby="produitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="produitModalLabel">Modifier le produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open('/produit/modification/', ['enctype' => 'multipart/form-data']); ?>
                <?= form_hidden('idproduit', ''); ?>
                <div class="modal-body">
                    <!-- Formulaire de modification -->
                    <div class="mb-3">
                        <?= form_label('Nom du Produit', 'titreproduit', ['class' => 'form-label']); ?>
                        <?= form_input(['name' => 'titreproduit', 'id' => 'titreproduit', 'class' => 'form-control']); ?>
                    </div>
                    <div class="mb-3">
                        <?= form_label('Description', 'descriptionproduit', ['class' => 'form-label']); ?>
                        <?= form_textarea(['name' => 'descriptionproduit', 'id' => 'descriptionproduit', 'class' => 'form-control']); ?>
                    </div>
                    <div class="mb-3">
                        <?= form_label('Prix', 'prix', ['class' => 'form-label']); ?>
                        <?= form_input(['name' => 'prix', 'id' => 'prix', 'class' => 'form-control']); ?>
                    </div>
                    <div class="mb-3">
                        <?= form_label('Image', 'fichier', ['class' => 'form-label']); ?>
                        <?= form_upload(['name' => 'fichier', 'id' => 'fichier', 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <?= form_submit('submit', 'Enregistrer', ['class' => 'btn btn-primary']); ?>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('produitModal');
            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                modal.querySelector('input[name="idproduit"]').value = button.getAttribute('data-id');
                modal.querySelector('input[name="titreproduit"]').value = button.getAttribute('data-titre');
                modal.querySelector('textarea[name="descriptionproduit"]').value = button.getAttribute('data-description');
                modal.querySelector('input[name="prix"]').value = button.getAttribute('data-prix');
            });
        });
    </script>
</body>

</html>
