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
            <i class="fas fa-percentage" onclick="window.location=' /promo'"></i>
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

            <!-- Tableau des produits -->
            <div class="table-responsive">
           <!-- Bouton pour ouvrir la modal d'ajout de produit -->
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajoutProduitModal">Ajouter un Produit</button>


                <h2>Produits</h2>
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th><a href="?orderby=idproduit&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">ID</a></th>
                            <th>Image</th>
                            <th><a href="?orderby=titreproduit&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Nom</a></th>
                            <th><a href="?orderby=descriptionproduit&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Description</a></th>
                            <th><a href="?orderby=prix&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Prix</a></th>
                            <th><a href="?orderby=valabilite&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Valabilité</a></th>
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
                                    <td><?=esc($produit['affichage']);?></td>
                                    <td><?=esc($produit['affichageaccueil']);?></td>

                                    <td>
                                        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#produitModal"
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
                                         </a>
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
           <!-- Bouton pour ouvrir la modal d'ajout de promotion -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajoutPromoModal">Ajouter une Promotion</button>

                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th><a href="?orderby=iddocument&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">ID</a></th>
                            <th><a href="?orderby=titredocument&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Nom</a></th>
                            <th><a href="?orderby=descriptiondocument&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Description</a></th>
                            <th><a href="?orderby=reductionpromo&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Pourcentage</a></th>
                            <th><a href="?orderby=codepromo&order=<?= $order === 'ASC' ? 'DESC' : 'ASC' ?>">Code Promo</a></th>
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
                                        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#promotionModal"
                                            data-idP="<?= esc($promotion['idpromotion']); ?>"
                                            data-titreP="<?= esc($promotion['titredocument']); ?>"
                                            data-descriptionP="<?= esc($promotion['descriptiondocument']); ?>"
                                            data-reductionP="<?= esc($promotion['reductionpromo']); ?>"
                                            data-codepromoP="<?= esc($promotion['codepromo']); ?>"
                                            data-activeP = "<?=esc($promotion['active']);?>"
                                            >
                                                Modifier
                                        </a>
                                        <a href="/promotion/suppression/<?= esc(data: $promotion['iddocument']); ?>" class="btn btn-danger btn-sm">Supprimer</a>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="produitModalLabel">Modifier le produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open('/produit/modification', ['enctype' => 'multipart/form-data', 'id' => 'produitForm']); ?>
                <?= form_hidden('idproduit', ''); ?>
                <div class="modal-body">
                    <!-- Nom -->
                    <div class="form-group">
                        <?= form_label('Nom du produit', 'titreproduit'); ?>
                        <?= form_input([
                            'name' => 'titreproduit',
                            'id' => 'titreproduit',
                            'class' => 'form-control',
                            'required' => true,
                            'placeholder' => 'Ex : Nom du produit...',
                        ]); ?>
                    </div>
                    <br>
                    <!-- Description -->
                    <div class="form-group">
                        <?= form_label('Description', 'descriptionproduit'); ?>
                        <?= form_textarea([
                            'name' => 'descriptionproduit',
                            'id' => 'descriptionproduit',
                            'class' => 'form-control',
                            'rows' => 3,
                            'required' => true,
                            'placeholder' => 'Brève description du produit...',
                        ]); ?>
                    </div>
                    <br>
                    <!-- Prix -->
                    <div class="form-group">
                        <?= form_label('Prix (€)', 'prix'); ?>
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
                    <br>
                    <!-- Image -->
                    <div class="form-group">
                        <?= form_label('Image du produit', 'fichier'); ?>
                        <?= form_upload([
                            'name' => 'fichier',
                            'id' => 'fichier',
                            'class' => 'form-control',
                            'accept' => 'image/*',
                        ]); ?>
                    </div>
                    <br>
                    <!-- Affichage -->
                    <div class="form-check form-switch">
                        <?= form_checkbox([
                            'name' => 'affichage',
                            'id' => 'affichage',
                            'class' => 'form-check-input',
                        ]); ?>
                        <?= form_label('Afficher le produit', 'affichage'); ?>
                    </div>
                    <br>
                    <!-- Affichage sur l'accueil -->
                    <div class="form-check form-switch">
                        <?= form_checkbox([
                            'name' => 'affichageacceuil',
                            'id' => 'affichageacceuil',
                            'class' => 'form-check-input',
                        ]); ?>
                        <?= form_label('Afficher sur l\'accueil', 'affichageacceuil'); ?>
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

    <div class="modal fade" id="promotionModal" tabindex="-1" aria-labelledby="promotionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="promotionModalLabel">Modifier le produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open('promotion/modifier', ['enctype' => 'multipart/form-data', 'id' => 'produitForm']); ?>
                <?= form_hidden('idpromotion', ''); ?>
                <div class="modal-body">
                    <!-- Nom -->
                    <div class="form-group">
                        <?= form_label('Nom de la promotion', 'titrepromotion'); ?>
                        <?= form_input([
                            'name' => 'titrepromotion',
                            'id' => 'titrepromotion',
                            'class' => 'form-control',
                            'required' => true,
                            'placeholder' => 'Ex : Nom du produit...',
                        ]); ?>
                    </div>
                    <br>
                    <!-- Description -->
                    <div class="form-group">
                        <?= form_label('Description', 'DescriptionPromotion'); ?>
                        <?= form_textarea([
                            'name' => 'DescriptionPromotion',
                            'id' => 'DescriptionPromotion',
                            'class' => 'form-control',
                            'rows' => 3,
                            'required' => true,
                            'placeholder' => 'Brève description du produit...',
                        ]); ?>
                    </div>
                    <br>
                    <!-- Prix -->
                    <div class="form-group">
                        <?= form_label('Reduction (%)', 'reduc'); ?>
                        <?= form_input([
                            'name' => 'reduc',
                            'id' => 'reduc',
                            'class' => 'form-control',
                            'type' => 'number',
                            'step' => '0.01',
                            'required' => true,
                            'placeholder' => 'Ex : 19.99',
                        ]); ?>
                    </div>
                    <br>
                       <!-- Description -->
                    <div class="form-group">
                    <?= form_label('Code de reduction', 'code'); ?>
                    <?= form_textarea([
                        'name' => 'code',
                        'id' => 'code',
                        'class' => 'form-control',
                        'rows' => 3,
                        'required' => true,
                    ]); ?>
                    </div>
                    <br>
                    <!-- Affichage -->
                     
                    <div class="form-check form-switch">
                        <?= form_checkbox([
                            'name' => 'active',
                            'id' => 'active',
                            'class' => 'form-check-input',
                        ]); ?>
                        <?= form_label('Active', 'active'); ?>
                    </div>
                    <br>          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <?= form_submit('submit', 'Enregistrer', ['class' => 'btn btn-primary']); ?>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Modal pour l'ajout de produit -->
    <div class="modal fade" id="ajoutProduitModal" tabindex="-1" aria-labelledby="ajoutProduitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajoutProduitModalLabel">Ajouter un Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open('/produit/creer', ['enctype' => 'multipart/form-data', 'id' => 'ajoutProduitForm']); ?>
                <div class="modal-body">
                    <!-- Nom -->
                    <div class="form-group">
                        <?= form_label('Nom du produit', 'titreproduit'); ?>
                        <?= form_input([
                            'name' => 'titreproduit',
                            'id' => 'titreproduit',
                            'class' => 'form-control',
                            'required' => true,
                            'placeholder' => 'Ex : Nom du produit...',
                        ]); ?>
                    </div>
                    <br>
                    <!-- Description -->
                    <div class="form-group">
                        <?= form_label('Description', 'descriptionproduit'); ?>
                        <?= form_textarea([
                            'name' => 'descriptionproduit',
                            'id' => 'descriptionproduit',
                            'class' => 'form-control',
                            'rows' => 3,
                            'required' => true,
                            'placeholder' => 'Brève description du produit...',
                        ]); ?>
                    </div>
                    <br>
                    <!-- Prix -->
                    <div class="form-group">
                        <?= form_label('Prix (€)', 'prix'); ?>
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
                    <br>
                    <!-- Image -->
                    <div class="form-group">
                        <?= form_label('Image du produit', 'fichier'); ?>
                        <?= form_upload([
                            'name' => 'fichier',
                            'id' => 'fichier',
                            'class' => 'form-control',
                            'accept' => 'image/*',
                        ]); ?>
                    </div>
                    <br>
                    <!-- Affichage -->
                    <div class="form-check form-switch">
                        <?= form_checkbox([
                            'name' => 'affichage',
                            'id' => 'affichage',
                            'class' => 'form-check-input',
                        ]); ?>
                        <?= form_label('Afficher le produit', 'affichage'); ?>
                    </div>
                    <br>
                    <!-- Affichage sur l'accueil -->
                    <div class="form-check form-switch">
                        <?= form_checkbox([
                            'name' => 'affichageacceuil',
                            'id' => 'affichageacceuil',
                            'class' => 'form-check-input',
                        ]); ?>
                        <?= form_label('Afficher sur l\'accueil', 'affichageacceuil'); ?>
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
    <!-- Modal pour l'ajout de promotion -->
    <!-- Modal pour la création de promotion -->
    <div class="modal fade" id="ajoutPromoModal" tabindex="-1" aria-labelledby="promotionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="promotionModalLabel">Créer une Promotion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= form_open('/promotion/creer'); ?>

                    <div class="form-group">
                        <?= form_label('Titre de la promotion :', 'Titre'); ?>
                        <?= form_input('Titre', set_value('Titre'), 'class="form-control" required'); ?>
                        <?= validation_show_error('Titre') ?>
                        <p>Le champ titre est requis</p>
                    </div>
                    <br>

                    <div class="form-group">
                        <?= form_label('Description de la promotion :', 'descriptiondocument'); ?>
                        <?= form_textarea('descriptiondocument', set_value('descriptiondocument'), 'class="form-control" required'); ?>
                        <?= validation_show_error('descriptiondocument') ?>
                    </div>

                    <div class="form-check">
                        <?= form_label('Active', 'active'); ?>
                        <?= form_checkbox('active', 'true', set_value('active') === 'true', 'class="form-check-input"'); ?>
                        <?= validation_show_error('active'); ?>
                    </div>

                    <div class="form-group">
                        <?= form_label('Réduction appliquée en % :', 'reduc'); ?>
                        <?= form_input('reduc', set_value('reduc'), 'class="form-control" required'); ?>
                        <?= validation_show_error('reduc') ?>
                    </div>
                    <br>

                    <div class="form-group">
                        <?= form_label('Code promotionnel pour appliquer la promotion :', 'codepromo'); ?>
                        <?= form_textarea('codepromo', set_value('codepromo'), 'class="form-control" required'); ?>
                        <?= validation_show_error('codepromo') ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <?= form_submit('submit', 'Créer la promotion', ['class' => 'btn btn-primary']); ?>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>


<!-- Script pour charger la modal Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('produitModal');
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            // Récupération des attributs data-* du bouton
            const id = button.getAttribute('data-id');
            const titre = button.getAttribute('data-titre');
            const description = button.getAttribute('data-description');
            const prix = button.getAttribute('data-prix');
            const affichage = button.getAttribute('data-affichage');
            const affichageAcceuil = button.getAttribute('data-affichageacceuil');

            // Charger les données dans la modal
            modal.querySelector('input[name="idproduit"]').value = id;
            modal.querySelector('input[name="titreproduit"]').value = titre;
            modal.querySelector('textarea[name="descriptionproduit"]').value = description;
            modal.querySelector('input[name="prix"]').value = prix;

            // Gestion des switches
            const affichageActive = affichage === 't' ? 'True' : (affichage === 'f' ? 'False' : 'Unknown');
            const affichageAcceuilActive = affichageAcceuil === 't' ? 'True' : (affichageAcceuil === 'f' ? 'False' : 'Unknown');

            const activeStatusLabel1 = document.getElementById('affichageActive');
            const activeStatusLabel2 = document.getElementById('affichageAcceuilActive');


            // Gestion des cases à cocher
            const checkboxAffichage = modal.querySelector('input[name="affichage"]');
            checkboxAffichage.checked = (affichage === 't'); // Si 't', coche la case

            const checkboxAffichageAcceuil = modal.querySelector('input[name="affichageacceuil"]');
            checkboxAffichageAcceuil.checked = (affichageAcceuil === 't'); // Si 't', coche la case
            
        });
    });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('promotionModal');
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Bouton qui a déclenché la modal
            const id = button.getAttribute('data-idP');
            const titre = button.getAttribute('data-titreP');
            const description = button.getAttribute('data-descriptionP');
            const active = button.getAttribute('data-activeP'); // Récupère la valeur de `active`
            const reduc = button.getAttribute('data-reductionP');
            const code = button.getAttribute('data-codepromoP');

            // Remplir les champs de la modal
            modal.querySelector('input[name="idpromotion"]').value = id;
            modal.querySelector('input[name="titrepromotion"]').value = titre;
            modal.querySelector('textarea[name="DescriptionPromotion"]').value = description;
            modal.querySelector('input[name="reduc"]').value = reduc;
            modal.querySelector('textarea[name="code"]').value = code;

            // Conversion de 't' en 'true' et 'f' en 'false'
            const activeStatus = active === 't' ? 'True' : (active === 'f' ? 'False' : 'Unknown');

            // Met à jour le label avec la valeur actuelle de `active`
            const activeStatusLabel = document.getElementById('activeStatus');

            // Gérer la case à cocher pour "active"
            const checkbox = modal.querySelector('input[name="active"]');
            checkbox.checked = (active === 't'); // Si active est 't', la case est cochée
        });
        });
    </script>
</body>

</html>
