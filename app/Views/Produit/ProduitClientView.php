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
                    <div class="card mb-4">
                        <!-- Section produit -->
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($produit['titreproduit']); ?></h5>
                            <p class="card-text"><?= esc($produit['descriptionproduit']); ?></p>
                            <div class="product-image text-center mb-3">
                                <?php
                                    $imagePath = base_url('uploads/' . $produit['photoproduit']);
                                ?>
                                <img src="<?= $imagePath ?>" alt="" class="img-fluid rounded">
                            </div>
                            <p class="card-text"><strong>Prix :</strong> <?= esc($produit['prix']); ?> €</p>
                        </div>
                        
                        <!-- Section commentaires -->
                        <div class="card-footer bg-light">
                            <?php 
                            $commentaireAssocie = array_filter($commentaire, function ($achat) use ($produit) {
                                return ($achat['idproduit'] == $produit['idproduit'])&& $achat['notetemoignage'] === null;
                            });
                            // Récupérer seulement le premier commentaire (s'il existe)
                            $commentaireAssocie = array_values($commentaireAssocie); // Réindexe le tableau
                            $premierCommentaire = $commentaireAssocie[0] ?? null; // Récupère le premier commentaire, ou null si vide
                            ?>

                            <?php if ($premierCommentaire !== null): ?>
                                <?php if ($premierCommentaire['notetemoignage'] !== null): ?>
                                    <div class="product-reviews mb-3">
                                        <h6 class="review-title text-primary">Votre Avis :</h6>
                                        <p class="review-rating mb-1"><strong>Note :</strong> <?= esc($premierCommentaire['notetemoignage']); ?> ⭐</p>
                                        <p class="review-date mb-1"><strong>Date :</strong> <?= esc($premierCommentaire['datetemoignage']); ?></p>
                                        <p class="review-text"><strong>Commentaire :</strong> <?= esc($premierCommentaire['avistemoignage']); ?></p>
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>" data-note="<?= esc($premierCommentaire['notetemoignage']); ?>" data-avis="<?= esc($premierCommentaire['avistemoignage']); ?>">
                                        Modifier votre commentaire
                                    </button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>">
                                        Ajouter un commentaire
                                    </button>
                                <?php endif; ?>
                            <?php else: ?>
                                <p class="text-muted">Aucun commentaire pour ce produit.</p>
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>">
                                    Ajouter un commentaire
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
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
            var note      = button.getAttribute('data-note');
            var avis      = button.getAttribute('data-avis');         
            // Récupérer le champ caché dans la modal et lui attribuer l'ID du produit
            var modalBodyInput = myModal.querySelector('#idProduit');
            modalBodyInput.value = idProduit;


            var modalBodyInputNote =myModal.querySelector('#noteTemoignage');
            modalBodyInputNote.value = note || '';

            var modalBodyInputAvis =myModal.querySelector('#avisTemoignage');
            modalBodyInputAvis.value = avis || '';

            // Mettre à jour l'action du formulaire avec l'ID du produit
            var form = myModal.querySelector('#formAvis');
            form.action = "<?= site_url('avis/ajouter/') ?>" + idProduit;
        });
    </script>

</body>

</html>
