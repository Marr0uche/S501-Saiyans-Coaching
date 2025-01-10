<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* Exemple de style CSS pour task-card */
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
    <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="<?php echo base_url('assets/img/logo.webp'); ?>" alt="Deviens un Saiyan"
                        width="80px"></a>
            </div>
	</nav>
<div class="container mt-5">
    <div id="infoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">    
        <?php if (!empty($produits)): ?>
            <?php
            $first = true;

            foreach ($promotion as $promo ):
                $activeClass = $first ? ' active' : '';
                $first = false; // Marque le premier élément comme actif
            ?>
                <div class="carousel-item<?= $activeClass ?>">
                    <h5><?= esc($promo['reductionpromo'] ); ?></h5>
                    <h5><?= esc($promo['codepromo']); ?></h5>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $promo['titredocument'] ?></h5>
                        <p><?= $promo['descriptiondocument'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <!-- Contrôles du carrousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#infoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#infoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>



    <div class="container mt-4">
        <div class="row">
            <div class="columns-wrapper">
                <?php if (!empty($produits)): ?>
                    <?php foreach ($produits as $produit): ?>
                        <div class="task-card"
                            onclick="window.location='/produit/unique/<?= urlencode($produit['idproduit']); ?>'">
                            <h5 class="card-title"><?= esc($produit['titreproduit']); ?></h5>
                            <p class="card-text"><?= esc($produit['descriptionproduit']); ?></p>
                            <p class="card-text">Photo : <img src="<?= esc($produit['photoproduit']); ?>" alt="Photo du produit" style="max-width: 100%; height: auto;"></p>
                            <p class="card-text">Prix : <?= esc($produit['prix']); ?> €</p>

                            <?php
                            $session = session();
                            $admin = $session->get('admin');
                            if ($admin === 't') : ?>
                                <a href="/produit/suppression/<?= urlencode($produit['idproduit']); ?>" class="btnTrash"> supp</a>
                                <a href="#" class="btn btn-primary" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#produitModal" 
                                    data-id="<?= esc($produit['idproduit']); ?>" 
                                    data-titre="<?= esc($produit['titreproduit']); ?>" 
                                    data-description="<?= esc($produit['descriptionproduit']); ?>" 
                                    data-photo="<?= esc($produit['photoproduit']); ?>" 
                                    data-prix="<?= esc($produit['prix']); ?>" 
                                    data-affichage="<?= esc($produit['affichage']); ?>"
                                    data-affichageDasboard="<?= esc($produit['affichageaccueil']); ?>"
                                    onclick="event.stopPropagation();">
                                    Modifier
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach;?>

                    <?php
                    if ($admin === 't') 
                    {?>
                        <a href="/produit/ajoutview" class="btn btn-success mt-3">Ajouter un produit</a>
                    <?php } ?>
                <?php else: ?>
                    <p class="text-muted">Aucun produit disponible.</p>
                <?php endif; ?>
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
                <!-- Formulaire d'édition -->
                <?= form_open('/produit/modification/', ['enctype' => 'multipart/form-data']); ?>
                <?= form_hidden('idproduit', ''); ?>

                <div class="modal-body">
                    <!-- Titre -->
                    <div class="mb-3">
                        <?= form_label('Titre du produit', 'titreproduit', ['class' => 'form-label']); ?>
                        <?= form_input([
                            'name' => 'titreproduit',
                            'id' => 'titreproduit',
                            'class' => 'form-control',
                            'value' => '',
                            'required' => 'required',
                        ]); ?>
                        <?= validation_show_error('titreproduit'); ?>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <?= form_label('Description', 'descriptionproduit', ['class' => 'form-label']); ?>
                        <?= form_textarea([
                            'name' => 'descriptionproduit',
                            'id' => 'descriptionproduit',
                            'class' => 'form-control',
                            'rows' => 3,
                            'value' => '',
                            'required' => 'required',
                        ]); ?>
                        <?= validation_show_error('descriptionproduit'); ?>
                    </div>

                    <!-- Prix -->
                    <div class="mb-3">
                        <?= form_label('Prix', 'prix', ['class' => 'form-label']); ?>
                        <?= form_input([
                            'name' => 'prix',
                            'id' => 'prix',
                            'class' => 'form-control',
                            'value' => '',
                            'required' => 'required',
                        ]); ?>
                        <?= validation_show_error('prix'); ?>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <?= form_label('Fichier image', 'fichier', ['class' => 'form-label']); ?>
                        <?= form_upload([
                            'name' => 'fichier',
                            'id' => 'fichier',
                            'class' => 'form-control'
                        ]); ?>
                        <?= validation_show_error('fichier'); ?>
                        <p>Actuellement : 
                            <img src="" alt="Photo actuelle" style="max-width: 100%; height: auto;" id="photo-actuelle">
                        </p>
                    </div>
                            <!-- Checkbox: Afficher sur la page d'accueil -->

                    <div class="mb-3">
                        <?= form_label('Afficher sur la page d\'accueil', 'affichageaccueil', ['class' => 'form-label']); ?>
                        <?= form_checkbox(
                            'affichageaccueil', 
                            'true', 
                            isset($produit['affichageaccueil']) && filter_var($produit['affichageaccueil'], FILTER_VALIDATE_BOOLEAN)
                        ); ?>
                        <?= validation_show_error('affichageaccueil'); ?>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Afficher', 'affichage', ['class' => 'form-label']); ?>
                        <?= form_checkbox(
                            'affichage', 
                            'true', 
                            isset($produit['affichage']) && filter_var($produit['affichage'], FILTER_VALIDATE_BOOLEAN)
                        ); ?>
                        <?= validation_show_error('affichage'); ?>
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
            const modal = document.getElementById('produitModal');
            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget; // Bouton qui a déclenché la modal
                const id = button.getAttribute('data-id');
                const titre = button.getAttribute('data-titre');
                const description = button.getAttribute('data-description');
                const photo = button.getAttribute('data-photo');
                const prix = button.getAttribute('data-prix');
                const affichage = button.getAttribute('data-affichage');
                const affichageacceuil = button.getAttribute('data-affichageDasboard');
                // Remplir les champs de la modal
                modal.querySelector('input[name="idproduit"]').value = id;
                modal.querySelector('input[name="titreproduit"]').value = titre;
                modal.querySelector('textarea[name="descriptionproduit"]').value = description;
                modal.querySelector('input[name="prix"]').value = prix;
                modal.querySelector('input[name="fichier"]').src = photo;
                modal.querySelector('input[name="affichageaccueil"]').checked =affichageacceuil;
                modal.querySelector('input[name="affichage"]').checked =affichage;
            });
        });
    </script>
</body>

</html>
