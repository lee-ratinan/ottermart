<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/@(:segment)/clear-cache', 'Home::clear_cache/$1');
// SERVICES
$routes->get('/@(:segment)/service-booking/(:segment)/(:segment)/slots', 'Home::service_booking_slots/$1/$2/$3'); // @(biz slug)/service-booking/(service slug)/(variant slug)/slots
$routes->get('/@(:segment)/service-booking/(:segment)/(:segment)/schedules', 'Home::service_booking_schedules/$1/$2/$3'); // @(biz slug)/service-booking/(service slug)/(variant slug)/schedules
// APIs
$routes->post('/@(:segment)/add-to-cart', 'Home::add_to_cart/$1'); // (@(big slug)/add-to-cart
// CHECKOUT
$routes->get('/@(:segment)/checkout', 'Home::checkout/$1'); // @(biz slug)/checkout
// INFO
$routes->get('/@(:segment)/(:segment)/(:segment)', 'Home::shop_info_page/$1/$2/$3'); // @(biz slug)/(services|products)/(service/product slug)
$routes->get('/@(:segment)', 'Home::shop_home/$1');
$routes->group('{locale}', ['filter' => 'localeGuard'], static function($routes) {
    // SERVICES
    $routes->get('@(:segment)/service-booking/(:segment)/(:segment)/slots', 'Home::service_booking_slots/$1/$2/$3'); // @(biz slug)/service-booking/(service slug)/(variant slug)/slots
    $routes->get('@(:segment)/service-booking/(:segment)/(:segment)/schedules', 'Home::service_booking_schedules/$1/$2/$3'); // @(biz slug)/service-booking/(service slug)/(variant slug)/schedules
    // APIs
    $routes->post('@(:segment)/add-to-cart', 'Home::add_to_cart/$1'); // (@(big slug)/add-to-cart
    // CHECKOUT
    $routes->get('@(:segment)/checkout', 'Home::checkout/$1'); // @(biz slug)/checkout
    // INFO
    $routes->get('@(:segment)/(:segment)/(:segment)', 'Home::shop_info_page/$1/$2/$3'); // @(biz slug)/(services|products)/(service/product slug)
    $routes->get('@(:segment)', 'Home::shop_home/$1');
    // HOME
    $routes->get('/', 'Home::index');
});
// HOME
$routes->get('/', 'Home::index');
