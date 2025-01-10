<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AccueilController::index');
$routes->get('/accueil', 'AccueilController::index');

//Blog
$routes->get('blog', 'ArticleController::indexBlog');
$routes->post('blog/nouveauTraitement', 'ArticleController::nouveauTraitement');
$routes->get('/blog/suppression/(:num)', 'ArticleController::suppression/$1');
$routes->get('/blog/modif/(:num)', 'ArticleController::modif/$1');
$routes->post('/blog/edition', 'ArticleController::edition');

// Actualités
$routes->get('actualites', 'ArticleController::indexActu');

// Affichage des produits dans la page formule
$routes->get('/Produit', 'ProduitController::index');

// Détails d'un produit en particulier
$routes->get('/produit/unique/(:num)', 'ProduitController::indexProduct/$1');

// Suppression d'un produit
$routes->get('/produit/suppression/(:num)', 'ProduitController::supprimer/$1');

// Création d'un produit
$routes->get('produit/ajoutview', 'ProduitController::creerView');
$routes->post('/produit/creer', 'ProduitController::creer');

// Modification d'un produit
$routes->post('/produit/modification', 'ProduitController::modifier');

//Gestion de produit
$routes->get('/produit/dashboard', 'ProduitController::indexDashboard');

// Authentification
$routes->get('authentification', 'AuthentificationController::index');
$routes->post('authentification/connexion', 'AuthentificationController::connexion');
$routes->get('authentification/deconnexion', 'AuthentificationController::deconnexion');

// Inscription
$routes->get('inscription', 'InscriptionController::index');
$routes->post('inscription/creer', 'InscriptionController::creer');

// Profile
$routes->get('/profile', 'ProfileController::index');
$routes->post('/profile/modifier', 'ProfileController::modifier');

// Promotion
$routes->get('/promotion/ajoutview', 'PromotionController::creerView');
$routes->post('/promotion/creer', 'PromotionController::creer');
$routes->get('/promo', 'PromotionController::index');
$routes->get('produit/promo', 'PromotionController::index');

$routes->post('promotion/modifier', 'PromotionController::modifier');
$routes->get('/promotion/suppression/(:num)', 'PromotionController::supprimer/$1');
$routes->post('promo/valider', 'PromotionController::valider');

// Admin
$routes->get('/admin/board', 'BoardController::board');

// Contact
$routes->get('/contact', 'ContactController::index');
$routes->post('/contact/send', 'ContactController::send');

// Avis
$routes->match(['get', 'post'], 'avis/ajouter/(:num)', 'AvisController::ajouter/$1');

//Questionnaire
$routes->get('/questionnaire', 'QuestionnaireController::index');
$routes->post('questionnaire/traitementQuestionnaire', 'QuestionnaireController::traitementQuestionnaire');

//Achat
$routes->get('/achat/(:num)', 'AchatController::indexAchat/$1');
$routes->get('/achat/ajouter/(:num)', 'AchatController::ajouter/$1');
$routes->get('/achat/confirme', 'AchatController::confirme');
$routes->get('/achat/allachat', 'AchatController::allachat');

// A propos
$routes->get('/A_propos', 'AProposController::index');
$routes->get('/avant-apres', 'AvantApresController::index');

// Mot de passe oublié
$routes->get('mdp-oublie', 'MdpOublieController::demanderEmail');
$routes->post('mdp-oublie/envoyer', 'MdpOublieController::envoyerEmail');
$routes->get('mdp-oublie/reinitialiser/(:segment)', 'MdpOublieController::afficherFormulaireReinitialisation/$1');
$routes->post('mdp-oublie/reinitialiser', 'MdpOublieController::reinitialiserMotDePasse');

// Paiement
$routes->get('/paiement/(:num)/(:any)', 'PaiementController::afficherPagePaiement/$1/$2');
$routes->post('paiement/traiter', 'PaiementController::traiterPaiement');

//Cgv
$routes->get('conditions-generales', 'CgvController::index');
