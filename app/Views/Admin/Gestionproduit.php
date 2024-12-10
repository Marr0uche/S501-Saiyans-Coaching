<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits et Promotions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>">
</head>

<body>
    <div class="container-dashboard">
        <!-- Barre latérale -->
        <div class="sidebar">
            <i class="fas fa-home" onclick="window.location='/'"></i>
            <i class="fas fa-boxes" onclick="window.location='/Produit'"></i>
            <i class="fas fa-percentage" onclick="window.location='promo'"></i>
            <i class="fas fa-chart-line" onclick="window.location='/admin/board'"></i>
            <i class="fas fa-sign-out-alt" onclick="window.location='/authentification/deconnexion'"></i>
        </div>

        <!-- Section principale -->
        <div class="dashboard-section">
            <h1 class="dashboard-title">Gestion des Produits et Promotions</h1>

            <!-- Notifications -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- Boutons d'ajout -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="/produit/ajoutview" class="btn btn-success">Ajouter un Produit</a>
                <a href="/promotion/ajoutview" class="btn btn-primary">Ajouter une Promotion</a>
            </div>

            <!-- Tableau des produits -->
            <div class="table-responsive">
                <h2>Produits</h2>
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th><a href="?orderby=idproduit&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>"></a>ID</th>
                            <th>Image</th>
                            <th><a href="?orderby=titreproduit&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>"></a>Nom</th>
                            <th><a href="?orderby=descriptionproduit&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>"></a>Description</th>
                            <th><a href="?orderby=prix&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>"></a>Prix</th>
                            <th><a href="?orderby=valabilite&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>"></a>Valabilité</th>
                            <th>Affichage</th>
                            <th>Affichage sur l'acceuil</th>

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
                                    <td><?=esc($produit['valabilite']);?>/mois</td>
                                    <td><?esc($produit['affichage']);?></td>
                                    <td><?esc($produit['affichageaccueil']);?></td>

                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#produitModal"
                                        data-id="<?= esc($produit['idproduit']); ?>"
                                        data-titre="<?= esc($produit['titreproduit']); ?>"
                                        data-description="<?= esc($produit['descriptionproduit']); ?>"
                                        data-prix="<?= esc($produit['prix']); ?>"
                                        data-photo="<?= esc($produit['photoproduit']); ?>"
                                        data-valabilite="<?= esc($produit['valabilite']); ?>"
                                        data-affichage = "<?=esc($produit['affichage']);?>"
                                        data-affichageAcceuil = "<?=esc($produit['affichageaccueil']);?>"
                                        >
                                            Modifier
                                        </button>
                                        <a href="/produit/suppression/<?= esc($produit['idproduit']); ?>" class="btn btn-danger btn-sm">Supprimer</a>
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

            <!-- Tableau des promotions -->
            <div class="table-responsive mt-5">
                <h2>Promotions</h2>
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Pourcentage</th>
                            <th>Code Promo</th>
                            <th>active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($promotions)): ?>
                            <?php foreach ($promotions as $promotion): ?>
                                <tr>
                                    <td><?= esc($promotion['idpromotion']); ?></td>
                                    <td><?= esc($promotion['titredocument']); ?></td>
                                    <td><?= esc($promotion['descriptiondocument']); ?></td>
                                    <td><?= esc($promotion['reductionpromo']); ?>%</td>
                                    <td><?= esc($promotion['codepromo']); ?></td>
                                    <td><?= esc($promotion['active']); ?></td>
                                    <td>
                                        <a href="/promotion/modification/<?= esc($promotion['idpromotion']); ?>" class="btn btn-primary btn-sm">Modifier</a>
                                        <a href="/promotion/suppression/<?= esc($promotion['idpromotion']); ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Aucune promotion disponible.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal pour modification -->
    <div class="modal fade" id="produitModal" tabindex="-1" aria-labelledby="produitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="produitModalLabel">Modifier le produit</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open('/produit/modification/', ['enctype' => 'multipart/form-data', 'id' => 'produitForm']); ?>
                <?= form_hidden('idproduit', ''); ?>
                <div class="modal-body">
                    <!-- Nom -->
                    <div class="mb-3">
                        <?= form_label('Nom du Produit', 'titreproduit', ['class' => 'form-label fw-bold']); ?>
                        <?= form_input([
                            'name' => 'titreproduit',
                            'id' => 'titreproduit',
                            'class' => 'form-control',
                            'required' => true,
                            'placeholder' => 'Ex : Nom du produit...',
                        ]); ?>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                        <?= form_label('Description', 'descriptionproduit', ['class' => 'form-label fw-bold']); ?>
                        <?= form_textarea([
                            'name' => 'descriptionproduit',
                            'id' => 'descriptionproduit',
                            'class' => 'form-control',
                            'rows' => 3,
                            'required' => true,
                            'placeholder' => 'Brève description du produit...',
                        ]); ?>
                    </div>
                    <!-- Prix -->
                    <div class="mb-3">
                        <?= form_label('Prix (€)', 'prix', ['class' => 'form-label fw-bold']); ?>
                        <?= form_input([
                            'name' => 'prix',
                            'id' => 'prix',
                            'class' => 'form-control',
                            'type' => 'number',
                            'step' => '0.01',
                            'required' => true,
                            'placeholder' => 'Ex : 19.99',
                        ]); ?>
                    </div>
                    <!-- Image -->
                    <div class="mb-3">
                        <?= form_label('Image du Produit', 'fichier', ['class' => 'form-label fw-bold']); ?>
                        <?= form_upload([
                            'name' => 'fichier',
                            'id' => 'fichier',
                            'class' => 'form-control',
                            'accept' => 'image/*',
                        ]); ?>
                    </div>
                    <!-- Aperçu de l'image -->
                    <div class="text-center">
                        <img id="previewImage" src="#" alt="Aperçu" class="img-fluid rounded shadow d-none" style="max-width: 100%; height: auto;">
                    </div>
                    <!-- Affichage -->
                    <div class="form-check form-switch mt-3">
                        <?= form_checkbox([
                            'name' => 'affichage',
                            'id' => 'affichage',
                            'class' => 'form-check-input',
                        ]); ?>
                        <?= form_label('Afficher le produit', 'affichage', ['class' => 'form-check-label']); ?>
                    </div>
                    <!-- Affichage sur l'accueil -->
                    <div class="form-check form-switch mt-3">
                        <?= form_checkbox([
                            'name' => 'affichageacceuil',
                            'id' => 'affichageacceuil',
                            'class' => 'form-check-input',
                        ]); ?>
                        <?= form_label('Afficher sur l\'accueil', 'affichageacceuil', ['class' => 'form-check-label']); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <?= form_submit('submit', 'Enregistrer', ['class' => 'btn btn-primary']); ?>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('produitModal');
        const previewImage = document.getElementById('previewImage');
        const fileInput = document.getElementById('fichier');
        const affichageCheckbox = document.getElementById('affichage');
        const affichageAcceuilCheckbox = document.getElementById('affichageacceuil');

        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            // Charger les données du produit dans la modal
            modal.querySelector('input[name="idproduit"]').value = button.getAttribute('data-id');
            modal.querySelector('input[name="titreproduit"]').value = button.getAttribute('data-titre');
            modal.querySelector('textarea[name="descriptionproduit"]').value = button.getAttribute('data-description');
            modal.querySelector('input[name="prix"]').value = button.getAttribute('data-prix');

            // Cases à cocher
            affichageCheckbox.checked = button.getAttribute('data-affichage') === '1';
            affichageAcceuilCheckbox.checked = button.getAttribute('data-affichageAcceuil') === '1';

            // Charger l'aperçu de l'image
            const photoUrl = button.getAttribute('data-photo');
            if (photoUrl) {
                previewImage.src = photoUrl;
                previewImage.classList.remove('d-none');
            } else {
                previewImage.classList.add('d-none');
            }
        });

        // Prévisualisation de l'image choisie
        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });
    });

    </script>
</body>

</html>
