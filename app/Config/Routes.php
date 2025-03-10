<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->get('/dashboard', 'Home::home');
$routes->get('/logout', 'Home::login');
