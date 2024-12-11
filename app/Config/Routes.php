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
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
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

// $routes->get('/', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/customer/dashboard', 'Customer::index');

$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
// $routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->post('/login/auth', 'Login::auth');

$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');

// akses COA
$routes->get('/coa', 'Coa::index', ['filter' => 'auth']);
$routes->get('/coa/add', 'Coa::add', ['filter' => 'auth']);
$routes->post('/coa/create', 'Coa::create', ['filter' => 'auth']);
$routes->post('/coa/add', 'Coa::add', ['filter' => 'auth']);
$routes->post('/coa/edit', 'Coa::edit', ['filter' => 'auth']);
$routes->post('/coa/delete', 'Coa::delete', ['filter' => 'auth']);

// akses jenis pengeluaran
$routes->get('/jenispengeluaran', 'JenisPengeluaran::index', ['filter' => 'auth']);
$routes->post('/jenispengeluaran/add', 'JenisPengeluaran::create', ['filter' => 'auth']);
$routes->post('/jenispengeluaran/edit', 'JenisPengeluaran::update', ['filter' => 'auth']);
$routes->post('/jenispengeluaran/delete', 'JenisPengeluaran::delete', ['filter' => 'auth']);

// akses pelanggan
$routes->get('/pelanggan', 'Pelanggan::index', ['filter' => 'auth']);
$routes->get('/pelanggan/add', 'Pelanggan::add', ['filter' => 'auth']);
$routes->post('/pelanggan/create', 'Pelanggan::create', ['filter' => 'auth']);
$routes->get('/pelanggan/edit/(:any)', 'Pelanggan::edit/$1', ['filter' => 'auth']);
$routes->post('/pelanggan/edit/(:any)', 'Pelanggan::edit/$1', ['filter' => 'auth']);
$routes->get('/pelanggan/delete/(:any)', 'Pelanggan::delete/$1', ['filter' => 'auth']);

// akses kendaraan
$routes->get('/kendaraan', 'Kendaraan::index', ['filter' => 'auth']);
$routes->get('/kendaraan/add', 'Kendaraan::add', ['filter' => 'auth']);
$routes->post('/kendaraan/create', 'Kendaraan::create', ['filter' => 'auth']);
$routes->get('/kendaraan/edit/(:any)', 'Kendaraan::edit/$1', ['filter' => 'auth']);
$routes->post('/kendaraan/edit/(:any)', 'Kendaraan::edit/$1', ['filter' => 'auth']);
$routes->get('/kendaraan/delete/(:any)', 'Kendaraan::delete/$1', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Transaction
 * --------------------------------------------------------------------
 */

// akses pemesanan
$routes->get('/pemesanan', 'Pemesanan::index', ['filter' => 'auth']);
$routes->get('/pemesanan/add', 'Pemesanan::add', ['filter' => 'auth']);
$routes->post('/pemesanan/create', 'Pemesanan::create', ['filter' => 'auth']);
$routes->get('/pemesanan/edit/(:any)', 'Pemesanan::edit/$1', ['filter' => 'auth']);
$routes->post('/pemesanan/edit/(:any)', 'Pemesanan::edit/$1', ['filter' => 'auth']);
$routes->get('pemesanan/approve/(:num)', 'Pemesanan::approve/$1');
$routes->get('pemesanan/disapprove/(:num)', 'Pemesanan::disapprove/$1');



// akses Pengeluaran
$routes->get('/pengeluaran', 'Pengeluaran::index', ['filter' => 'auth']);
$routes->get('/pengeluaran/add', 'Pengeluaran::add', ['filter' => 'auth']);
$routes->post('/pengeluaran/create', 'Pengeluaran::create', ['filter' => 'auth']);
$routes->get('/pengeluaran/edit/(:any)', 'Pengeluaran::edit/$1', ['filter' => 'auth']);
$routes->post('/pengeluaran/edit/(:any)', 'Pengeluaran::edit/$1', ['filter' => 'auth']);
$routes->post('/pengeluaran/delete', 'Pengeluaran::delete', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Report
 * --------------------------------------------------------------------
 */

// akses Jurnal
$routes->get('/jurnal', 'Laporan\Jurnal::index', ['filter' => 'auth']);
$routes->get('/jurnal/index', 'Laporan\Jurnal::index', ['filter' => 'auth']);
$routes->post('/jurnal/(:any)', 'Laporan\Jurnal::show_data_jurnal', ['filter' => 'auth']);

//akses Buku Besar
$routes->get('/buku-besar', 'Laporan\BukuBesar::index', ['filter' => 'auth']);
$routes->get('/buku-besar/index', 'Laporan\BukuBesar::index', ['filter' => 'auth']);
$routes->post('/buku-besar/(:any)', 'Laporan\BukuBesar::show_data_buku_besar', ['filter' => 'auth']);

//akses Laba Rugi
$routes->get('/laba-rugi', 'Laporan\LabaRugi::index', ['filter' => 'auth']);
$routes->get('/laba-rugi/index', 'Laporan\LabaRugi::index', ['filter' => 'auth']);
$routes->post('/laba-rugi/(:any)', 'Laporan\LabaRugi::show_data_laba_rugi', ['filter' => 'auth']);

//buat unduh nota
$routes->get('pemesanan/nota/(:num)', 'Pemesanan::nota/$1');

$routes->get('customer/dashboard', 'Customer::index');

$routes->post('pelanggan/add_data_pelanggan/(:num)', 'Pelanggan::create/$1');


$routes->get('rent/(:num)', 'Customer::show/$1');


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