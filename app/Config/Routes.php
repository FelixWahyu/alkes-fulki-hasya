<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Frontend Routes
$routes->get('/', 'Home::index');
$routes->get('tentang-kami', 'Home::about');
$routes->get('katalog', 'Product::index');
$routes->get('produk/(:segment)', 'Product::detail/$1');
$routes->get('kontak', 'Home::contact');

// Form WA & Leads Logic
$routes->post('checkout/process', 'Product::processCheckout');
$routes->post('partnership/submit', 'Home::submitPartnership');

// Admin Panel Routes (Protected by Auth Filter nantinya)
$routes->group('admin', function($routes) {
    $routes->get('login', 'Admin\Auth::login');
    $routes->post('login/process', 'Admin\Auth::process');
    $routes->get('logout', 'Admin\Auth::logout');
    
    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->get('products/delete-image/(:num)', 'Admin\Product::deleteImage/$1');
    
    // CRUD Products
    $routes->resource('products', ['controller' => 'Admin\Product']);
    
    // CRUD Categories
    $routes->resource('categories', ['controller' => 'Admin\Category']);
    
    // Settings CMS (Video Hero, WA, Text)
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update-text', 'Admin\Settings::updateText');
    $routes->post('settings/update-video', 'Admin\Settings::updateHeroVideo'); // Rute untuk upload video
    $routes->post('settings/update-logo', 'Admin\Settings::updateLogo'); // Rute untuk upload logo
    $routes->get('change-password', 'Admin\Auth::changePassword');
    $routes->post('update-password', 'Admin\Auth::updatePassword');

    $routes->post('products/store', 'Admin\Product::store');

    // Partnerships
    $routes->get('partnerships', 'Admin\Partnership::index');
    $routes->get('partnerships/(:num)', 'Admin\Partnership::view/$1');
    $routes->post('partnerships/delete/(:num)', 'Admin\Partnership::delete/$1');
});