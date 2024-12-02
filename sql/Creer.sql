-- Supprimer les tables dans l'ordre inverse des dépendances
DROP TABLE IF EXISTS Utiliser CASCADE;
DROP TABLE IF EXISTS Acheter CASCADE;
DROP TABLE IF EXISTS Temoinage CASCADE;
DROP TABLE IF EXISTS CodePromo CASCADE;
DROP TABLE IF EXISTS Promotion CASCADE;
DROP TABLE IF EXISTS Article CASCADE;
DROP TABLE IF EXISTS VideoCoaching CASCADE;
DROP TABLE IF EXISTS Client CASCADE;
DROP TABLE IF EXISTS Produit CASCADE;
DROP TABLE IF EXISTS Document CASCADE;
DROP TABLE IF EXISTS Adresse CASCADE;
DROP TABLE IF EXISTS Utilisateur CASCADE;


-- Table Utilisateur : type parent
CREATE TABLE Utilisateur (
    idUtilisateur  SERIAL PRIMARY KEY,
    Type VARCHAR(50),
    nom VARCHAR(15),
    prenom VARCHAR(15),
    Adresse_email VARCHAR(255) NOT NULL UNIQUE,
    motDePasse VARCHAR(255) NOT NULL,
    Adresse VARCHAR(255),
    Tel VARCHAR(15)
);

-- Table Client : hérite de Utilisateur
CREATE TABLE Client (
    idClient  SERIAL PRIMARY KEY,
    Sexe VARCHAR(10),
    age INT,
    Taille FLOAT,
    poids_de_corps FLOAT,
    produits TEXT,
    FOREIGN KEY (idClient) REFERENCES Utilisateur(idUtilisateur) ON DELETE CASCADE
);

-- Table Adresse : liée à Utilisateur
CREATE TABLE Adresse (
    idAdresse  SERIAL PRIMARY KEY,
    Adresse VARCHAR(255),
    Ville VARCHAR(255),
    code_postal VARCHAR(20),
    Pays VARCHAR(100),
    region VARCHAR(255),
    telephoneFixe VARCHAR(20),
    idUtilisateurAdresse INT,
    FOREIGN KEY (idUtilisateurAdresse) REFERENCES Utilisateur(idUtilisateur) ON DELETE SET NULL
);

-- Table Produit
CREATE TABLE Produit (
    idProduit SERIAL PRIMARY KEY,
    Titre VARCHAR(255),
    photo VARCHAR(255),
    Description TEXT,
    prix DECIMAL(10,2)
);

-- Table Acheter : relation entre Client et Produit
CREATE TABLE Acheter (
    idAcheter SERIAL PRIMARY KEY,
    idClient INT,
    idProduit INT,
    FOREIGN KEY (idClient) REFERENCES Client(idClient) ON DELETE CASCADE,
    FOREIGN KEY (idProduit) REFERENCES Produit(idProduit) ON DELETE CASCADE
);

-- Table Témoignage : lié à Client et Produit
CREATE TABLE Temoinage (
    idTemoignage SERIAL PRIMARY KEY,
    idClient INT,
    idProduit INT,
    note INT,
    dateTemoignage TIMESTAMP,
    avis VARCHAR(255),
    typeTemoignage VARCHAR(50),
    FOREIGN KEY (idClient) REFERENCES Client(idClient) ON DELETE CASCADE,
    FOREIGN KEY (idProduit) REFERENCES Produit(idProduit) ON DELETE SET NULL
);

-- Table Document : type parent
CREATE TABLE Document (
    idDocument SERIAL PRIMARY KEY,
    Titre VARCHAR(255),
    description TEXT
);

-- Table Article : hérite de Document
CREATE TABLE Article (
    idArticle INT PRIMARY KEY,
    Auteur VARCHAR(255),
    DatePublication TIMESTAMP,
    Image VARCHAR(255),
    FOREIGN KEY (idArticle) REFERENCES Document(idDocument) ON DELETE CASCADE
);

-- Table Promotion : hérite de Document
CREATE TABLE Promotion (
    idPromotion INT PRIMARY KEY,
    DateDebut TIMESTAMP,
    DateFin TIMESTAMP,
    reductionPromo DECIMAL(10,2),
    ConditionPromo VARCHAR(255),
    FOREIGN KEY (idPromotion) REFERENCES Document(idDocument) ON DELETE CASCADE
);

-- Table Code_promo : lié à Promotion
CREATE TABLE CodePromo (
    idCodePromo SERIAL PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    reduction DECIMAL(10,2),
    type VARCHAR(50),
    nombreUtilisation INT,
    dateValidite TIMESTAMP,
    conditionCodePromo VARCHAR(255),
    idPromotion INT,
    FOREIGN KEY (idPromotion) REFERENCES Promotion(idPromotion) ON DELETE CASCADE
);

-- Table Vidéo_coaching : hérite de Document
CREATE TABLE VideoCoaching (
    idVideo INT PRIMARY KEY,
    video VARCHAR(255),
    FOREIGN KEY (idVideo) REFERENCES Document(idDocument) ON DELETE CASCADE
);

-- Table Utiliser : relation entre Client et Code_promo
CREATE TABLE Utiliser (
    id SERIAL PRIMARY KEY,
    idClient INT,
    idCodePromo INT,
    dateUtilisation TIMESTAMP,
    FOREIGN KEY (idClient) REFERENCES Client(idClient) ON DELETE CASCADE,
    FOREIGN KEY (idCodePromo) REFERENCES CodePromo(idCodePromo) ON DELETE CASCADE
);
