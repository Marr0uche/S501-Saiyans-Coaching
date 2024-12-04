<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthentificationController::index');

//Blog
$routes->get('blog', 'ArticleController::indexBlog');
$routes->post('blog/nouveauTraitement', 'ArticleController::nouveauTraitement');
$routes->get('/blog/suppression/(:num)', 'ArticleController::suppression/$1');
$routes->get('/blog/modif/(:num)', 'ArticleController::modif/$1');
$routes->post('/blog/edition', 'ArticleController::edition');

//Actualités
$routes->get('actualites', 'ArticleController::indexActu');

//Affichage des produit dans la page formule
$routes->get('/Produit','ProduitController::index');

//Détails d'un produit en particulier
$routes->get('/produit/unique/(:num)', 'ProduitController::indexProduct/$1');

//Supression d'un produit
$routes->get('/produit/suppression/(:num)', 'ProduitController::supprimer/$1');

//Creer d'un produit
$routes->get('/produit/ajoutview','ProduitController::creerView');
$routes->post('/produit/creer','ProduitController::creer');

//modification d'un projet
$routes->post('/produit/modification','ProduitController::modifier');

$routes->get('authentification', 'AuthentificationController::index');
$routes->post('authentification/connexion', 'AuthentificationController::connexion');
$routes->get('authentification/deconnexion', 'AuthentificationController::deconnexion');

$routes->get('inscription', 'InscriptionController::index');
$routes->post('inscription/creer', 'InscriptionController::creer');

$routes->get('/profile', 'ProfileController::index');
$routes->post('/profile/modifier', 'ProfileController::modifier');

//Promotion
$routes->get('/promotion/ajoutview','PromotionController::creerView');
$routes->get('/promotion/creer','PromotionController::creer');
$routes->get('promo','PromotionController::index');
$routes->post('promotion/modifier','PromotionController::modifier');
$routes->get('/promotion/suppression/(:num)','PromotionController::supprimer/$1');
//Admin
$routes->get('/admin/board', 'BoardController::board');
