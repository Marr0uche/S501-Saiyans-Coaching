<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('blog', 'BlogController::index');
$routes->post('blog/nouveauTraitement', 'BlogController::nouveauTraitement');
$routes->get('/blog/suppression/(:num)', 'BlogController::suppression/$1');
$routes->get('/blog/modif/(:num)', 'BlogController::modif/$1');
$routes->post('/blog/edition', 'BlogController::edition');