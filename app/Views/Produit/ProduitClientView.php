<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
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
                                <p class="card-text-price"><strong>Prix :</strong> <?= esc($produit['prix']); ?> €</p>
                            </div>

                            <!-- Section commentaires -->
                            <div class="card-footer bg-light">
                                <?php
                                $commentaireAssocie = array_filter($commentaire, function ($achat) use ($produit) {
                                    return ($achat['idproduit'] == $produit['idproduit']);
                                });
                                // Récupérer seulement le premier commentaire (s'il existe)
                                $commentaireAssocie = array_values($commentaireAssocie); // Réindexe le tableau
                                $premierCommentaire = $commentaireAssocie[0] ?? null; // Récupère le premier commentaire, ou null si vide
                                ?>

                                <?php if ($premierCommentaire !== null): ?>
                                    <?php if ($premierCommentaire['notetemoignage'] !== null): ?>
                                        <div class="product-reviews mb-3">
                                            <h6 class="review-title text-primary">Votre Avis :</h6>
                                            <p class="review-rating mb-1"><strong>Note :</strong>
                                                <?= esc($premierCommentaire['notetemoignage']); ?> ⭐</p>
                                            <p class="review-date mb-1"><strong>Date :</strong>
                                                <?= esc($premierCommentaire['datetemoignage']); ?></p>
                                            <p class="review-text"><strong>Commentaire :</strong>
                                                <?= esc($premierCommentaire['avistemoignage']); ?></p>
                                        </div>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>"
                                            data-note="<?= esc($premierCommentaire['notetemoignage']); ?>"
                                            data-avis="<?= esc($premierCommentaire['avistemoignage']); ?>">
                                            Modifier votre commentaire
                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-comm btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>">
                                            Ajouter un commentaire
                                        </button>

                                    <?php endif; ?>
                                <?php else: ?>
                                    <p class="text-muted">Aucun commentaire pour ce produit.</p>
                                    <button type="button" class="btn btn-comm btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#ajouterAvisModal" data-idproduit="<?= $produit['idproduit'] ?>">
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


    <!-- Modale corrigée -->
    <div id="ajouterAvisModal" class="custom-modal">
        <div class="custom-modal-dialog">
            <div class="custom-modal-content">
                <div class="custom-modal-header">
                    <h5 class="custom-modal-title">Ajouter un Avis</h5>
                    <button type="button" class="custom-modal-close">&times;</button>
                </div>
                <div class="custom-modal-body">
                    <!-- Formulaire pour ajouter un avis -->
                    <form method="post" action="" id="formAvis">
                        <div class="mb-3">
                            <label for="noteTemoignage" class="form-label">Note :</label>
                            <input type="number" name="noteTemoignage" id="noteTemoignage" min="1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="avisTemoignage" class="form-label">Votre Avis :</label>
                            <textarea name="avisTemoignage" id="avisTemoignage" rows="5" required></textarea>
                        </div>
                        <!-- Champ caché pour l'ID du produit -->
                        <input type="hidden" name="idProduit" id="idProduit" value="">

                        <button type="submit" class="btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript pour le fonctionnement de la modale -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('ajouterAvisModal');
            const closeModalBtn = modal.querySelector('.custom-modal-close');
            const triggers = document.querySelectorAll('[data-bs-toggle="modal"]');

            // Ouvrir la modale
            triggers.forEach(trigger => {
                trigger.addEventListener('click', function () {
                    const idProduit = this.getAttribute('data-idproduit');
                    const note = this.getAttribute('data-note');
                    const avis = this.getAttribute('data-avis');

                    modal.querySelector('#idProduit').value = idProduit || '';
                    modal.querySelector('#noteTemoignage').value = note || '';
                    modal.querySelector('#avisTemoignage').value = avis || '';

                    modal.style.display = 'flex';
                });
            });

            // Fermer la modale
            closeModalBtn.addEventListener('click', function () {
                modal.style.display = 'none';
            });

            // Fermer la modale en cliquant en dehors
            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>