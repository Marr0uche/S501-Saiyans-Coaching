<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthentificationController::index');

$routes->get('blog', 'BlogController::index');
$routes->get('blog/nouveau', 'BlogController::nouveau');

$routes->get('authentification', 'AuthentificationController::index');
$routes->post('authentification/connexion', 'AuthentificationController::connexion');
$routes->get('authentification/deconnexion', 'AuthentificationController::deconnexion');

$routes->get('inscription', 'InscriptionController::index');
$routes->post('inscription/creer', 'InscriptionController::creer');