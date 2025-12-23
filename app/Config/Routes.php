<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/@(:any)/booking', 'Home::shop_booking/$1');
$routes->get('/@(:any)', 'Home::shop_home/$1');
$routes->group('{locale}', ['filter' => 'localeGuard'], static function($routes) {
    $routes->get('@(:any)/booking', 'Home::shop_booking/$1');
    $routes->get('@(:any)', 'Home::shop_home/$1');
    // HOME
    $routes->get('/', 'Home::index');
});
// HOME
$routes->get('/', 'Home::index');
