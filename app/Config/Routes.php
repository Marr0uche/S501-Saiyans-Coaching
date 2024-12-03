<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('blog', 'BlogController::index');
$routes->get('blog/nouveau', 'BlogController::nouveau');
