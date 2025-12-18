<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/@(:any)/booking', 'Home::shop_booking/$1');
$routes->get('/@(:any)', 'Home::shop_home/$1');
