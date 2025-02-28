-- Supprimer les tables dans l'ordre inverse des dépendances
DROP TABLE IF EXISTS Vivre CASCADE;

DROP TABLE IF EXISTS Acheter CASCADE;

DROP TABLE IF EXISTS Appliquer CASCADE;

DROP TABLE IF EXISTS Promotion CASCADE;

DROP TABLE IF EXISTS Article CASCADE;

DROP TABLE IF EXISTS VideoCoaching CASCADE;

DROP TABLE IF EXISTS Client CASCADE;

DROP TABLE IF EXISTS Produit CASCADE;

DROP TABLE IF EXISTS Document CASCADE;

DROP TABLE IF EXISTS Adresse CASCADE;

-- Table Client
CREATE TABLE
	Client (
		idClient SERIAL PRIMARY KEY,
		admin BOOLEAN NOT NULL,
		nom VARCHAR(15) NOT NULL,
		prenom VARCHAR(15) NOT NULL,
		mail VARCHAR(255) NOT NULL,
		motDePasse VARCHAR(255) NOT NULL,
		mobile VARCHAR(15) NOT NULL,
		sexe VARCHAR(10) NOT NULL,
		datenaissance DATE NOT NULL,
		taille FLOAT NOT NULL,
		poidsdecorps FLOAT NOT NULL,
		token VARCHAR(255)
	);

-- Table Adresse
CREATE TABLE
	Adresse (
		idAdresse SERIAL PRIMARY KEY,
		adresse VARCHAR(255) NOT NULL,
		ville VARCHAR(255) NOT NULL,
		region VARCHAR(255),
		codePostal VARCHAR(20) NOT NULL,
		Pays VARCHAR(100) NOT NULL,
		telephoneFixe VARCHAR(20)
	);

-- Table Document : type parent
CREATE TABLE
	Document (
		idDocument SERIAL PRIMARY KEY,
		titreDocument VARCHAR(255),
		descriptionDocument TEXT
	);

-- Table Produit
CREATE TABLE
	Produit (
		idProduit SERIAL PRIMARY KEY,
		TitreProduit VARCHAR(255),
		photoProduit VARCHAR(255),
		descriptionProduit TEXT,
		prix DECIMAL(10, 2),
		valabilite INT,
		affichage BOOLEAN,
		affichageAccueil BOOLEAN
	);

-- Table Vivre : liaison entre adresse et Client
<<<<<<< HEAD
CREATE TABLE Vivre(
    idClient INT,
    idAdresse INT,
    PRIMARY KEY (idClient, idAdresse),
    FOREIGN KEY (idClient) REFERENCES Client(idClient) ON DELETE CASCADE,
    FOREIGN KEY (idAdresse) REFERENCES Adresse(idAdresse) ON DELETE CASCADE

);
=======
CREATE TABLE
	Vivre (
		idClient INT,
		idAdresse INT,
		FOREIGN KEY (idClient) REFERENCES Client (idClient) ON DELETE CASCADE,
		FOREIGN KEY (idAdresse) REFERENCES Adresse (idAdresse) ON DELETE CASCADE
	);
>>>>>>> ec1b0710d8afabf0432edfe2e9d55834e2107b7f

-- Table Promotion : hérite de Document
CREATE TABLE
	Promotion (
		idPromotion SERIAL,
		active BOOLEAN NOT NULL,
		reductionPromo DECIMAL(10, 2) NOT NULL,
		codePromo VARCHAR(20)
	) INHERITS (Document);

-- Table Appliquer : Liaison entre Produit et promotion
<<<<<<< HEAD
CREATE TABLE Appliquer(
    idPromotion INT,
    idProduit INT,
    PRIMARY KEY (idPromotion, idProduit),
    FOREIGN KEY (idPromotion) REFERENCES Promotion(idPromotion) ON DELETE CASCADE,
    FOREIGN KEY (idProduit) REFERENCES Produit(idProduit) ON DELETE CASCADE

);
=======
CREATE TABLE
	Appliquer (
		idDocument INT,
		idProduit INT,
		FOREIGN KEY (idDocument) REFERENCES Document (idDocument) ON DELETE CASCADE,
		FOREIGN KEY (idProduit) REFERENCES Produit (idProduit) ON DELETE CASCADE
	);
>>>>>>> ec1b0710d8afabf0432edfe2e9d55834e2107b7f

-- Table Article : hérite de Document
CREATE TABLE
	Article (
		DatePublication TIMESTAMP,
		Image VARCHAR(255),
		blog BOOLEAN
	) INHERITS (Document);

-- Table Acheter : relation entre Client et Produit
<<<<<<< HEAD
CREATE TABLE Acheter (
    idClient INT,
    idProduit INT,
    noteTemoignage INT,
    dateTemoignage TIMESTAMP,
    avisTemoignage VARCHAR(255), 
    idPromotion INT,
    PRIMARY KEY (idClient, idProduit),
    FOREIGN KEY(idPromotion) REFERENCES Promotion(idPromotion) ON DELETE CASCADE,
    FOREIGN KEY (idClient) REFERENCES Client(idClient) ON DELETE CASCADE,
    FOREIGN KEY (idProduit) REFERENCES Produit(idProduit) ON DELETE CASCADE
);
=======
CREATE TABLE
	Acheter (
		idClient INT,
		idProduit INT,
		noteTemoignage INT,
		dateTemoignage TIMESTAMP,
		avisTemoignage VARCHAR(255),
		idDocument INT,
		FOREIGN KEY (idDocument) REFERENCES Document (idDocument) ON DELETE CASCADE,
		FOREIGN KEY (idClient) REFERENCES Client (idClient) ON DELETE CASCADE,
		FOREIGN KEY (idProduit) REFERENCES Produit (idProduit) ON DELETE CASCADE
	);
>>>>>>> ec1b0710d8afabf0432edfe2e9d55834e2107b7f

-- Table Vidéo_coaching : hérite de Document
CREATE TABLE
	VideoCoaching (video VARCHAR(255)) INHERITS (Document);