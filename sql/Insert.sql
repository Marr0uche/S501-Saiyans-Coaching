INSERT INTO
	client (
		nom,
		prenom,
		mail,
		mobile,
		sexe,
		taille,
		poidsdecorps,
		datenaissance,
		motdepasse,
		admin
	)
VALUES
	-- Moins de 20 ans
	(
		'Dupont',
		'Lucas',
		'lucas.dupont@mail.com',
		'0612345678',
		'Homme',
		175,
		65,
		'2005-06-15',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Martin',
		'Emma',
		'emma.martin@mail.com',
		'0623456789',
		'Femme',
		160,
		55,
		'2007-03-22',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Petit',
		'Tom',
		'tom.petit@mail.com',
		'0634567890',
		'Homme',
		180,
		75,
		'2006-09-11',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Leroy',
		'Chloé',
		'chloe.leroy@mail.com',
		'0645678901',
		'Femme',
		165,
		50,
		'2008-12-05',
		'$2y$10$samplehash12345',
		false
	),
	-- Entre 20 et 30 ans
	(
		'Durand',
		'Maxime',
		'maxime.durand@mail.com',
		'0656789012',
		'Homme',
		180,
		80,
		'1995-04-10',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Morel',
		'Alice',
		'alice.morel@mail.com',
		'0667890123',
		'Femme',
		170,
		60,
		'1998-08-17',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Roux',
		'Kevin',
		'kevin.roux@mail.com',
		'0678901234',
		'Homme',
		175,
		85,
		'1993-01-02',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Fournier',
		'Claire',
		'claire.fournier@mail.com',
		'0689012345',
		'Femme',
		160,
		55,
		'1997-06-14',
		'$2y$10$samplehash12345',
		false
	),
	-- Entre 31 et 50 ans
	(
		'Garnier',
		'Julien',
		'julien.garnier@mail.com',
		'0690123456',
		'Homme',
		185,
		90,
		'1985-03-23',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Blanc',
		'Sophie',
		'sophie.blanc@mail.com',
		'0601234567',
		'Femme',
		165,
		62,
		'1988-07-30',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Perrot',
		'François',
		'francois.perrot@mail.com',
		'0612345678',
		'Homme',
		178,
		88,
		'1975-05-20',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Fontaine',
		'Camille',
		'camille.fontaine@mail.com',
		'0623456789',
		'Femme',
		170,
		65,
		'1982-09-12',
		'$2y$10$samplehash12345',
		false
	),
	-- Plus de 50 ans
	(
		'Dupuis',
		'Jean',
		'jean.dupuis@mail.com',
		'0634567890',
		'Homme',
		170,
		78,
		'1955-04-18',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Bernard',
		'Marie',
		'marie.bernard@mail.com',
		'0645678901',
		'Femme',
		160,
		70,
		'1960-11-02',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Simon',
		'Paul',
		'paul.simon@mail.com',
		'0656789012',
		'Homme',
		165,
		85,
		'1948-03-05',
		'$2y$10$samplehash12345',
		false
	),
	(
		'Lambert',
		'Odile',
		'odile.lambert@mail.com',
		'0667890123',
		'Femme',
		155,
		68,
		'1953-07-19',
		'$2y$10$samplehash12345',
		false
	);

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

INSERT INTO Produit (TitreProduit, photoProduit, descriptionProduit, prix, valabilite, affichage, affichageAccueil)
VALUES 
('Programme Fitness Débutant', 'fitness.jpg', 'Un programme complet pour débutants.', 49.99, 6, TRUE, TRUE),
('Programme Perte de Poids', 'weightloss.webp', 'Un programme pour brûler les graisses.', 59.99, 6, TRUE, TRUE),
('Programme Gain de Masse', 'massgain.webp', 'Un programme pour prendre de la masse.', 69.99, 6, TRUE, TRUE);

INSERT INTO
	Document (
		titreDocument,
		descriptionDocument
	)
VALUES
	(
		'Promo de Noël',
		'Réduction spéciale pour Noël'
	),
	(
		'Promo de Printemps',
		'Réduction pour le printemps'
	),
	(
		'Promo de Rentrée',
		'Réduction pour la rentrée'
	);

-- Insertion dans Promotion
INSERT INTO
	Promotion (
		idDocument,
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
	),
	(
		3,
		'Promo de Rentrée',
		'Réduction pour la rentrée',
		FALSE,
		10.00,
		'RENTREE2024'
	);

-- Insérer quelques articles
INSERT INTO Article (titreDocument, descriptionDocument, DatePublication, Image, blog)
VALUES 
('Comment débuter ?', 'Pas évident de choisir une activité physique quand votre dernier contact avec le sport remonte à plus de 10 ans. Avec le temps, vous remarquez que votre souffle aussi prend quelques années. Les balades à vélo du dimanche deviennent plus difficiles, le bas du dos fait des siennes … Ah, les bienfaits de l’activité physique, on les avait presque oubliés. C’est décidé, aujourd’hui, vous commencez le sport !', NOW(), 'debuter.jpg', TRUE),
('Absence du 25/12', 'Bonjour, je serais absent du 23/12 au 28/12 à cause des vacances de Noel', NOW(), 'noel.jpg', FALSE);

-- Insérer quelques articles  sans image
INSERT INTO Article (titreDocument, descriptionDocument, DatePublication, blog)
VALUES 
('Les bienfaits du sport', 'Lorsqu’on pratique une activité sportive, le corps sécrète des hormones telles que l’endorphine, la dopamine ou l’adrénaline qui permettent de réduire le stress, améliorer la qualité du sommeil, diminuer les douleurs et agir comme un antidépresseur, c’est donc avant tout une source de plaisir.', NOW(), TRUE),
('Evenement à la Salle le 20/12', 'Je vous donne rendez-vous le 20 Décembre à 14h, salle Louis Blanc, pour un cours spécial ZUMBA avec Mme Gislaine.', NOW(), FALSE);

-- Insertion dans Acheter
INSERT INTO
	Acheter (
		idClient,
		idProduit,
		noteTemoignage,
		dateTemoignage,
		avisTemoignage
	)
VALUES
	(
		1,
		1,
		5,
		'2024-12-01 15:00:00',
		'Super produit !'
	),
	(
		2,
		1,
		5,
		'2024-12-01 15:00:00',
		'J''ai beaucoup aimé !'
	),
	(
		2,
		2,
		4,
		'2024-12-02 12:30:00',
		'Bon rapport qualité-prix'
	),
	(
		3,
		3,
		3,
		'2024-12-03 14:00:00',
		'Correct mais peut mieux faire'
	);