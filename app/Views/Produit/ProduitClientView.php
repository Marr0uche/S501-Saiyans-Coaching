<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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
                    <div class="task-card">
                        <h5 class="card-title"><?= esc($produit['titreproduit']); ?></h5>
                        <p class="card-text"><?= esc($produit['descriptionproduit']); ?></p>
                        <?php
                            $imagePath = base_url('uploads/' . $produit['photoproduit']);
                        ?>
                        <img src="<?= $imagePath ?>" alt="Image" class="img-fluid">
                        <p class="card-text">Prix : <?= esc($produit['prix']); ?> €</p>
                    </div>

                    <!-- Vérifier s'il y a des commentaires -->
                    <?php if (isset($commentaire) && !empty($commentaire)): ?>
                        <div class="product-reviews">
                            <?php foreach ($commentaire as $achat): ?>
                                <?php if (isset($achat['notetemoignage']) && $achat['notetemoignage'] !== null): ?>
                                    <div class="product-review">
                                        <p class="review-rating">Note : <?= esc($achat['notetemoignage']); ?> ⭐</p>
                                        <?php if (isset($achat['datetemoignage'])): ?>
                                            <p class="review-date">Date : <?= esc($achat['datetemoignage']); ?></p>
                                        <?php endif; ?>
                                        <?php if (isset($achat['avistemoignage'])): ?>
                                            <p class="review-text"><?= esc($achat['avistemoignage']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        </div>
                        <!-- Bouton pour modifier le commentaire si des avis existent -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>">
                            Modifier votre commentaire
                        </button>
                    <?php else: ?>
                        <p class="no-reviews">Vous n'avez laissez aucun avis sur ce produit.</p>
                        <!-- Bouton pour ajouter un commentaire si aucun avis n'existe -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>">
                            Ajouter un commentaire
                        </button>
                    <?php endif; ?>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    </div>

    <div class="modal fade" id="ajouterAvisModal" tabindex="-1" aria-labelledby="ajouterAvisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterAvisModalLabel">Ajouter un Avis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire pour ajouter un avis -->
                    <form method="post" action="" id="formAvis">
                        <div class="mb-3">
                            <label for="noteTemoignage" class="form-label">Note :</label>
                            <input type="number" name="noteTemoignage" id="noteTemoignage" min="1" max="5" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="avisTemoignage" class="form-label">Votre Avis :</label>
                            <textarea name="avisTemoignage" id="avisTemoignage" rows="5" class="form-control" required></textarea>
                        </div>
                        <!-- Champ caché pour l'ID du produit -->
                        <input type="hidden" name="idProduit" id="idProduit" value="">

                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var myModal = document.getElementById('ajouterAvisModal');
        myModal.addEventListener('show.bs.modal', function (event) {
            // Récupérer le bouton qui a déclenché l'ouverture de la modal
            var button = event.relatedTarget; 
            
            // Récupérer l'ID du produit depuis l'attribut 'data-idproduit'
            var idProduit = button.getAttribute('data-idproduit');
            
            // Récupérer le champ caché dans la modal et lui attribuer l'ID du produit
            var modalBodyInput = myModal.querySelector('#idProduit');
            modalBodyInput.value = idProduit;

            // Mettre à jour l'action du formulaire avec l'ID du produit
            var form = myModal.querySelector('#formAvis');
            form.action = "<?= site_url('avis/ajouter/') ?>" + idProduit;
        });
    </script>

</body>

</html>
