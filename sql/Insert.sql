-- Insertion des données dans la table Client
INSERT INTO Client (admin, nom, prenom, mail, motDePasse, mobile, sexe, datenaissance, taille, poidsdecorps, token)
VALUES
    (TRUE, 'Admin', 'User', 'admin@example.com', 'hashed_password1', '1234567890', 'Homme', '1990-01-01', 180.5, 75.0, 'token_admin'),
    (FALSE, 'John', 'Doe', 'john.doe@example.com', 'hashed_password2', '0987654321', 'Homme', '2004-08-12', 175.0, 70.0, NULL),
    (FALSE, 'Jane', 'Smith', 'jane.smith@example.com', 'hashed_password3', '1122334455', 'Femme', '2001-06-10', 165.0, 60.0, NULL);

-- Insertion des données dans la table Adresse
INSERT INTO
	Adresse (
		adresse,
		ville,
		region,
		codePostal,
		Pays,
		telephoneFixe
	)
VALUES
	(
		'123 Main St',
		'Paris',
		'Île-de-France',
		'75001',
		'France',
		'0145678912'
	),
	(
		'456 Elm St',
		'Lyon',
		'Auvergne-Rhône-Alpes',
		'69000',
		'France',
		'0478654321'
	),
	(
		'789 Oak St',
		'Marseille',
		'Provence-Alpes-Côte d''Azur',
		'13000',
		'France',
		'0491123456'
	);

-- Insertion des données dans la table Vivre
INSERT INTO
	Vivre (idClient, idAdresse)
VALUES
	(1, 1),
	(2, 2),
	(3, 3);

-- Insertion des données dans la table Produit
INSERT INTO
	Produit (
		TitreProduit,
		photoProduit,
		descriptionProduit,
		prix,
		affichage,
		affichageAccueil
	)
VALUES
	(
		'Produit A',
		'photo_a.jpg',
		'Description du produit A',
		19.99,
		TRUE,
		TRUE
	),
	(
		'Produit B',
		'photo_b.jpg',
		'Description du produit B',
		29.99,
		TRUE,
		TRUE
	),
	(
		'Produit C',
		'photo_c.jpg',
		'Description du produit C',
		15.99,
		FALSE,
		FALSE
	);

-- Insertion des données dans la table Promotion
INSERT INTO
	Promotion (
		idPromotion,
		titreDocument,
		descriptionDocument,
		active,
		reductionPromo,
		codePromo
	)
VALUES
	(
		1,
		'Promo de Noël',
		'Réduction spéciale pour Noël',
		TRUE,
		10.50,
		'NOEL2024'
	),
	(
		2,
		'Promo de Printemps',
		'Réduction pour le printemps',
		TRUE,
		15.00,
		'SPRING2024'
	);

-- Insertion des données dans la table Appliquer
INSERT INTO
	Appliquer (idPromotion, idProduit)
VALUES
	(1, 1),
	(1, 2),
	(2, 3);

-- Insertion des données dans la table Article
INSERT INTO
	Article (
		idDocument,
		titreDocument,
		descriptionDocument,
		DatePublication,
		Image
	)
VALUES
	(
		3,
		'Article A',
		'Description de l''article A',
		'2024-12-01 10:00:00',
		'article_a.jpg'
	),
	(
		4,
		'Article B',
		'Description de l''article B',
		'2024-12-02 11:00:00',
		'article_b.jpg'
	);

-- Insertion des données dans la table Acheter
INSERT INTO
	Acheter (
		idClient,
		idProduit,
		noteTemoignage,
		dateTemoignage,
		avisTemoignage,
		idPromotion
	)
VALUES
	(
		1,
		1,
		5,
		'2024-12-01 15:00:00',
		'Super produit !',
		1
	),
	(
		2,
		2,
		4,
		'2024-12-02 12:30:00',
		'Bon rapport qualité-prix',
		1
	),
	(
		3,
		3,
		3,
		'2024-12-03 14:00:00',
		'Produit correct mais peut mieux faire',
		2
	);

-- Insertion des données dans la table VideoCoaching
INSERT INTO
	VideoCoaching (
		idDocument,
		titreDocument,
		descriptionDocument,
		video
	)
VALUES
	(
		5,
		'Vidéo Coaching 1',
		'Description de la vidéo de coaching 1',
		'video1.mp4'
	),
	(
		6,
		'Vidéo Coaching 2',
		'Description de la vidéo de coaching 2',
		'video2.mp4'
	);