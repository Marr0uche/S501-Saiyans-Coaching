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
$routes->get('admin/produit/dashboard', 'ProduitController::indexDashboard');

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
$routes->get('promo', 'PromotionController::index');
$routes->post('promotion/modifier', 'PromotionController::modifier');
$routes->get('/promotion/suppression/(:num)', 'PromotionController::supprimer/$1');

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

// A propos
$routes->get('/A_propos', 'AProposController::index');

$routes->get('mdp-oublie', 'MdpOublieController::demanderEmail');
$routes->post('mdp-oublie/envoyer', 'MdpOublieController::envoyerEmail');
$routes->get('mdp-oublie/reinitialiser/(:segment)', 'MdpOublieController::afficherFormulaireReinitialisation/$1');
$routes->post('mdp-oublie/reinitialiser', 'MdpOublieController::reinitialiserMotDePasse');
