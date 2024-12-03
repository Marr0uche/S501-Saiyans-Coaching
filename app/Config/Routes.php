<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('blog', 'BlogController::index');
$routes->get('blog/nouveau', 'BlogController::nouveau');



//Affichage des produit dans la page formule
$routes->get('/Produit','ProduitController::index');

//Détails d'un produit en particulier 
$routes->get('/produit/unique/(:num)', 'ProduitController::indexProduct/$1');

//Supression d'un produit
$routes->get('/produit/suppression/(:num)', 'ProduitController::supprimer/$1');

//Ajout d'un produit 
$routes->get('/produit/ajoutview','ProduitController::creerView');
$routes->post('/produit/ajout','ProduitController::creer');

//modification d'un projet
$routes->post('/produit/modification','ProduitController::modifier');