<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Kost::index');
$routes->get('login', 'Auth::loginOption');
$routes->match(['get', 'post'], 'login/pemilik', 'Auth::loginPemilik');
$routes->match(['get', 'post'], 'login/pencari', 'Auth::loginPencari');
$routes->match(['get', 'post'], 'register', 'Auth::register');
$routes->get('logout', 'Auth::logout');

$routes->get('home', 'Kost::index');
$routes->get('all-kost', 'Kost::all');
$routes->get('kost/(:segment)', 'Kost::full_detail/$1');
$routes->get('pesan/kost/(:segment)', 'Pesan::save/$1', ['filter' => 'pencari']);

$routes->get('/pemilik/tambah-kost', 'Kost::create');
$routes->post('/pemilik/save', 'Kost::save');
$routes->get('/pemilik', 'Kost::dashboard', ['filter' => 'pemilik']);
$routes->get('/pemilik/dashboard', 'Kost::dashboard', ['filter' => 'pemilik']);
$routes->get('/pemilik/delete-kost/(:segment)', 'Kost::delete/$1', ['filter' => 'pemilik']);
$routes->get('/pemilik/edit-kost/(:segment)', 'Kost::edit/$1', ['filter' => 'pemilik']);
$routes->post('/pemilik/update/(:segment)', 'Kost::update/$1', ['filter' => 'pemilik']);
$routes->get('/pemilik/detail-kost/(:segment)', 'Kost::detail/$1', ['filter' => 'pemilik']);
$routes->get('/pemilik/pesan', 'Pesan::index', ['filter' => 'pemilik']);
$routes->get('/pemilik/pesan-kost/terima/(:segment)', 'Pesan::terima/$1', ['filter' => 'pemilik']);
$routes->get('/pemilik/pesan-kost/tolak/(:segment)', 'Pesan::tolak/$1', ['filter' => 'pemilik']);

$routes->get('/pencari/pesananku', 'Pesan::pencariPesan', ['filter' => 'pencari']);
$routes->get('/pesananku/batal/(:segment)', 'Pesan::batal/$1', ['filter' => 'pencari']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
