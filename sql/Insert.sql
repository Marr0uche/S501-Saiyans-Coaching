-- Insérer des données dans la table Client
INSERT INTO Client (admin, nom, prenom, mail, motDePasse, Adresse, mobile, Sexe, age, Taille, poids_de_corps, token)
VALUES 
    (TRUE, 'Doe', 'John', 'john.doe@example.com', 'password123', '123 Main St', '0612345678', 'Homme', 30, 1.75, 70.0, 'token123'),
    (FALSE, 'Smith', 'Jane', 'jane.smith@example.com', 'password456', '456 Elm St', '0698765432', 'Femme', 25, 1.65, 55.0, 'token456');

-- Insérer des données dans la table Adresse
INSERT INTO Adresse (adresse, ville, region, codePostal, Pays, telephoneFixe)
VALUES 
    ('123 Main St', 'Paris', 'Ile-de-France', '75000', 'France', '0145678901'),
    ('456 Elm St', 'Lyon', 'Auvergne-Rhône-Alpes', '69000', 'France', '0478123456');

-- Insérer des données dans la table Produit
INSERT INTO Produit (TitreProduit, descriptionProduit, photoProduit, prix, Affichage)
VALUES 
    ('Chaise ergonomique', 'Chaise confortable pour le travail', 'chaise.jpg', 120.50, TRUE),
    ('Table basse', 'Table basse en bois massif', 'table.jpg', 95.00, TRUE);

-- Insérer des données dans la table Vivre
INSERT INTO Vivre (idClient, idAdresse)
VALUES 
    (1, 1),
    (2, 2);

-- Insérer des données dans la table Promotion
INSERT INTO Promotion (idPromotion, titreDocument, descriptionDocument, active, reductionPromo, codePromo)
VALUES 
    (1, 'Promo spéciale', 'Réduction de 10% sur tous les produits', TRUE, 10.00, 'PROMO10'),
    (2, 'Promo été', 'Réduction de 15% pour les produits d''été', FALSE, 15.00, 'PROMO15');

-- Insérer des données dans la table Appliquer
INSERT INTO Appliquer (idPromotion, idProduit)
VALUES 
    (1, 1),
    (1, 2),
    (2, 2);

-- Insérer des données dans la table Article
INSERT INTO Article (idDocument, titreDocument, descriptionDocument, DatePublication, Image)
VALUES 
    (3, 'Guide d''entraînement', 'Guide complet pour s''entraîner efficacement', '2024-01-01 10:00:00', 'guide.jpg'),
    (4, 'Conseils nutrition', 'Tout savoir sur une alimentation saine', '2024-02-01 12:00:00', 'nutrition.jpg');

-- Insérer des données dans la table Acheter
INSERT INTO Acheter (idClient, idProduit, noteTemoignage, dateTemoignage, avisTemoignage, idPromotion)
VALUES 
    (1, 1, 5, '2024-01-15 14:30:00', 'Très satisfait du produit', 1),
    (2, 2, 4, '2024-02-10 16:45:00', 'Bon rapport qualité/prix', 2);

-- Insérer des données dans la table VideoCoaching
INSERT INTO VideoCoaching (idDocument, titreDocument, descriptionDocument, video)
VALUES 
    (5, 'Yoga pour débutants', 'Vidéo d''initiation au yoga', 'yoga.mp4'),
    (6, 'Fitness avancé', 'Entraînement fitness pour les pros', 'fitness.mp4');
