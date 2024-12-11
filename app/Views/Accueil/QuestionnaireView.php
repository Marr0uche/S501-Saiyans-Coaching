<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire - Saiyans Coaching</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/questionnaire.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/footer.css'); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
		integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php echo view('elements/Navbar'); ?>

    <div class="container">
        <h1 class="text-center mb-4">Bienvenue !</h1>
        <p>Merci de prendre quelques minutes pour répondre à ces questions. Vos réponses nous aideront à identifier le programme de coaching qui vous conviendra le mieux.</p>

        <?php echo form_open('questionnaire/traitementQuestionnaire'); ?>

        <div class="question">
            <?php 
            echo form_label('Nom', 'nom', ['class' => 'form-label']); 
            echo form_input('nom', set_value('nom'), [
                'class' => 'form-control',
                'id' => 'nom',
                'placeholder' => 'Votre nom',
                'required' => true
            ]);
            echo validation_show_error('nom');
            ?>
        </div>

        <div class="question">
            <?php 
            echo form_label('Adresse e-mail', 'email', ['class' => 'form-label']); 
            echo form_input([
                'type' => 'email',
                'name' => 'email',
                'id' => 'email',
                'value' => set_value('email'),
                'class' => 'form-control',
                'placeholder' => 'Votre adresse e-mail',
                'required' => true
            ]);
            echo validation_show_error('email');
            ?>
        </div>

        <!-- Question 1 -->
        <div class="question">
            <label class="form-label">1. Êtes-vous ?</label>
            <div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="homme" name="sexe" value="homme" required>
                    <label for="homme" class="form-check-label">Un homme</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="femme" name="sexe" value="femme" required>
                    <label for="femme" class="form-check-label">Une femme</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="autre" name="sexe" value="autre" required>
                    <label for="autre" class="form-check-label">Autre</label>
                </div>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="question">
            <label class="form-label">2. Quels sont vos principaux objectifs ?</label>
            <?php
            $objectifs = [
                "Perte de poids",
                "Prise de muscle",
                "Amélioration de la flexibilité et de la mobilité",
                "Amélioration de l’endurance et de la condition physique",
                "Amélioration du bien-être général (santé, sommeil, gestion du stress)",
                "Développement personnel et confiance en soi"
            ];
            foreach ($objectifs as $objectif): ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="<?= $objectif ?>" name="objectifs[]" value="<?= $objectif ?>">
                    <label for="<?= $objectif ?>" class="form-check-label"><?= $objectif ?></label>
                </div>
            <?php endforeach; ?>
            <div class="mt-2">
                <label for="autre_objectif" class="form-label">Autre (précisez) :</label>
                <input type="text" class="form-control" id="autre_objectif" name="autre_objectif">
            </div>
        </div>

        <!-- Question 3 -->
        <div class="question">
            <label class="form-label">3. Quel est votre niveau actuel de condition physique ?</label>
            <div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="debutant" name="niveau" value="Débutant" required>
                    <label for="debutant" class="form-check-label">🟢 Débutant</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="intermediaire" name="niveau" value="Intermédiaire" required>
                    <label for="intermediaire" class="form-check-label">🟡 Intermédiaire</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="avance" name="niveau" value="Avancé" required>
                    <label for="avance" class="form-check-label">🔴 Avancé</label>
                </div>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="question">
            <label class="form-label">4. Combien de temps pouvez-vous consacrer à votre programme par semaine ?</label>
            <?php
            $temps = [
                "Moins de 2 heures par semaine",
                "2 à 4 heures par semaine",
                "4 à 6 heures par semaine",
                "Plus de 6 heures par semaine"
            ];
            foreach ($temps as $option): ?>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="<?= $option ?>" name="temps" value="<?= $option ?>" required>
                    <label for="<?= $option ?>" class="form-check-label"><?= $option ?></label>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Question 5 -->
        <div class="question">
            <label class="form-label">5. Avez-vous des contraintes physiques ou des blessures à prendre en compte ?</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="oui_contraintes" name="contraintes" value="Oui" required>
                <label for="oui_contraintes" class="form-check-label">Oui, j’ai des limitations physiques ou des blessures (précisez) :</label>
            </div>
            <textarea id="limitation_physique" name="limitation_physique" class="form-control"></textarea>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="non_contraintes" name="contraintes" value="Non" required>
                <label for="non_contraintes" class="form-check-label">Non, je n’ai pas de contraintes</label>
            </div>
        </div>

        <!-- Question 6 -->
        <div class="question">
            <label class="form-label">6. Quels types d'exercices ou d'activités préférez vous ?</label>
            <?php
            $exercices = [
                "Cardio (course, vélo, HIIT, etc.)",
                "Renforcement musculaire (musculation, poids libres)",
                "Exercices de souplesse (yoga, pilates)",
                "Sports collectifs ou d’équipe",
                "Exercices en extérieur (randonnée, course à pied, etc.)"
            ];
            foreach ($exercices as $exercice): ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="<?= $exercice ?>" name="exercices[]" value="<?= $exercice ?>">
                    <label for="<?= $exercice ?>" class="form-check-label"><?= $exercice ?></label>
                </div>
            <?php endforeach; ?>
            <div class="mt-2">
                <label for="autre_exercice" class="form-label">Autre (précisez) :</label>
                <input type="text" class="form-control" id="autre_exercice" name="autre_exercice">
            </div>
        </div>

        <!-- Question 7 -->
        <div class="question">
            <label class="form-label">7. Avez-vous des préférences pour le suivi de votre programme ?</label>
            <?php
            $preferences = [
                "Coaching individuel en présentiel",
                "Coaching individuel en ligne",
                "Programme autonome avec support en ligne",
                "Programme en groupe sans ou en classe",
                "Peu importe, je suis ouvert à toutes les options"
            ];
            foreach ($preferences as $preference):?>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="<?= $preference ?>" name="preference" value="<?= $preference ?>" required>
                    <label for="<?= $preference ?>" class="form-check-label"><?= $preference ?></label>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Question 8 -->
        <div class="question">
            <label class="form-label">8. Quels résultats souhaitez-vous atteindre et dans quel délai ?</label>
            <small class="text-muted d-block mb-2">Exemple : “Perdre 5 kg en 3 mois” ou “Augmenter ma force d’ici 6 mois”</small>
            <textarea class="form-control" id="resultats" name="resultats" rows="3" placeholder="Votre réponse..."></textarea>
        </div>

        <!-- Question 9 -->
        <div class="question">
            <label class="form-label">9. Privilégiez-vous un style de coaching particulier ?</label>
            <?php
            $styles = [
                "Coaching motivant et énergique",
                "Coaching plus calme et structuré",
                "Coaching avec un focus mental (méditation, gestion du stress)",
                "Peu importe"
            ];
            foreach ($styles as $style): ?>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="<?= $style ?>" name="style_coaching" value="<?= $style ?>" required>
                    <label for="<?= $style ?>" class="form-check-label"><?= $style ?></label>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Question 10 -->
        <div class="question">
            <label class="form-label">10. Êtes-vous intéressé par des conseils nutritionnels dans le cadre de votre programme ?</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="nutrition_oui" name="nutrition" value="Oui" required>
                <label for="nutrition_oui" class="form-check-label">Oui</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="nutrition_non" name="nutrition" value="Non" required>
                <label for="nutrition_non" class="form-check-label">Non</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="nutrition_peutetre" name="nutrition" value="Peut-être" required>
                <label for="nutrition_peutetre" class="form-check-label">Peut-être</label>
            </div>
        </div>

        <!-- Question 11 -->
        <div class="question">
            <label class="form-label">11. Souhaitez-vous ajouter des précisions ou des informations supplémentaires ?</label>
            <small class="text-muted d-block mb-2">Exemple : disponibilité, objectifs spécifiques, attentes</small>
            <textarea class="form-control" id="informations_supplementaires" name="informations_supplementaires" rows="4" placeholder="Votre réponse..."></textarea>
        </div>

        <p>Merci pour vos réponses !<br>
        Le coach reviendra vers vous avec le meilleur programme pour vous !</p>


        <div class="text-center">
            <button type="submit">Soumettre</button>
        </div>
        <?php echo form_close(); ?>
    </div>

    <?php echo view('elements/Footer'); ?>
</body>

</html>
