<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/@(:segment)/clear-cache', 'Home::clear_cache/$1', ['filter' => 'cors']);
// SERVICES
$routes->get('/@(:segment)/service-booking/(:segment)/(:segment)/slots', 'Home::service_booking_slots/$1/$2/$3'); // @(biz slug)/service-booking/(service slug)/(variant slug)/slots
$routes->get('/@(:segment)/service-booking/(:segment)/(:segment)/schedules', 'Home::service_booking_schedules/$1/$2/$3'); // @(biz slug)/service-booking/(service slug)/(variant slug)/schedules
// APIs
$routes->post('/@(:segment)/add-to-cart', 'Home::add_to_cart/$1'); // (@(biz slug)/add-to-cart
$routes->post('/@(:segment)/remove-from-cart', 'Home::remove_from_cart/$1'); // (@(biz slug)/remove-from-cart
$routes->get('/@(:segment)/get-cart', 'Home::get_cart/$1'); // (@(biz slug)/get-cart
$routes->get('/@(:segment)/clear-cart', 'Home::clear_cart/$1'); // (@(biz slug)/clear-cart
$routes->get('/@(:segment)/cart', 'Home::cart/$1'); // (@(biz slug)/clear-cart
$routes->get('/@(:segment)/get-reviews', 'Home::get_reviews/$1');
// CHECKOUT
$routes->get('/@(:segment)/checkout', 'Home::checkout/$1'); // @(biz slug)/checkout
$routes->post('/@(:segment)/confirm-checkout', 'Home::confirm_checkout/$1');
$routes->get('/@(:segment)/check-order', 'Home::check_order/$1');
$routes->get('/@(:segment)/check-order/(:segment)', 'Home::check_order/$1/$2');
$routes->get('/@(:segment)/check-order/(:segment)/thank-you', 'Home::check_order/$1/$2/thank-you');
// INFO
$routes->get('/@(:segment)/(:segment)/(:segment)', 'Home::shop_info_page/$1/$2/$3'); // @(biz slug)/(services|products)/(service/product slug)
$routes->get('/@(:segment)', 'Home::shop_home/$1');
$routes->group('{locale}', ['filter' => 'localeGuard'], static function($routes) {
    // SERVICES
    $routes->get('@(:segment)/service-booking/(:segment)/(:segment)/slots', 'Home::service_booking_slots/$1/$2/$3'); // @(biz slug)/service-booking/(service slug)/(variant slug)/slots
    $routes->get('@(:segment)/service-booking/(:segment)/(:segment)/schedules', 'Home::service_booking_schedules/$1/$2/$3'); // @(biz slug)/service-booking/(service slug)/(variant slug)/schedules
    // APIs
    $routes->post('@(:segment)/add-to-cart', 'Home::add_to_cart/$1'); // (@(biz slug)/add-to-cart
    $routes->get('@(:segment)/get-cart', 'Home::get_cart/$1'); // (@(biz slug)/get-cart
    $routes->get('@(:segment)/clear-cart', 'Home::clear_cart/$1'); // (@(biz slug)/clear-cart
    $routes->get('@(:segment)/cart', 'Home::cart/$1'); // (@(biz slug)/clear-cart
    $routes->get('@(:segment)/get-reviews', 'Home::get_reviews/$1');
    // CHECKOUT
    $routes->get('@(:segment)/checkout', 'Home::checkout/$1'); // @(biz slug)/checkout
    $routes->post('@(:segment)/confirm-checkout', 'Home::confirm_checkout/$1');
    $routes->get('@(:segment)/check-order', 'Home::check_order/$1');
    $routes->get('@(:segment)/check-order/(:segment)', 'Home::check_order/$1/$2');
    $routes->get('@(:segment)/check-order/(:segment)/thank-you', 'Home::check_order/$1/$2/thank-you');
    // INFO
    $routes->get('@(:segment)/(:segment)/(:segment)', 'Home::shop_info_page/$1/$2/$3'); // @(biz slug)/(services|products)/(service/product slug)
    $routes->get('@(:segment)', 'Home::shop_home/$1');
    // HOME
    $routes->get('/', 'Home::index');
});
// HOME
$routes->get('/', 'Home::index');

$routes->set404Override('App\Controllers\Home::show404');