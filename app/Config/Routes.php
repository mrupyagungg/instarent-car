<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

// --------------------------------------------------------------------
// Router Setup
// --------------------------------------------------------------------
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// --------------------------------------------------------------------
// Route Definitions
// --------------------------------------------------------------------

// Auth routes
$routes->get('/customer/dashboard', 'Customer::index');
$routes->get('/', 'Customer::guest');

$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');

// Customer
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/customer/dashboard', 'Customer::index', ['filter' => 'auth']);
$routes->post('customer/store', 'Customer::store');


// COA routes
$routes->group('coa', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Coa::index');
    $routes->get('add', 'Coa::add');
    $routes->post('create', 'Coa::create');
    $routes->post('edit', 'Coa::edit');
    $routes->post('delete', 'Coa::delete');
});

// Jenis Pengeluaran
$routes->group('jenispengeluaran', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'JenisPengeluaran::index');
    $routes->post('add', 'JenisPengeluaran::create');
    $routes->post('edit', 'JenisPengeluaran::update');
    $routes->post('delete', 'JenisPengeluaran::delete');
});

// Pelanggan
$routes->group('pelanggan', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Pelanggan::index');
    $routes->get('add', 'Pelanggan::add');
    $routes->post('create', 'Pelanggan::create');
    $routes->get('edit/(:any)', 'Pelanggan::edit/$1');
    $routes->post('edit/(:any)', 'Pelanggan::edit/$1');
    $routes->get('delete/(:any)', 'Pelanggan::delete/$1');
});

// Kendaraan
$routes->group('kendaraan', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Kendaraan::index');
    $routes->get('add', 'Kendaraan::add');
    $routes->post('create', 'Kendaraan::create');
    $routes->get('edit/(:any)', 'Kendaraan::edit/$1');
    $routes->post('edit/(:any)', 'Kendaraan::edit/$1');
    $routes->get('delete/(:any)', 'Kendaraan::delete/$1');
});

// Pemesanan
$routes->group('pemesanan', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Pemesanan::index');
    $routes->get('add', 'Pemesanan::add');
    $routes->post('create', 'Pemesanan::create');
    $routes->get('edit/(:any)', 'Pemesanan::edit/$1');
    $routes->post('edit/(:any)', 'Pemesanan::edit/$1');
    $routes->get('approve/(:num)', 'Pemesanan::approve/$1');
    $routes->get('disapprove/(:num)', 'Pemesanan::disapprove/$1');
    $routes->get('nota/(:num)', 'Pemesanan::nota/$1');
});

$routes->get('pemesanan/index', 'PemesananController::index');
$routes->get('pemesanan/index(:num)', 'PemesananController::index/$1');

// Pengeluaran
$routes->group('pengeluaran', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Pengeluaran::index');
    $routes->get('add', 'Pengeluaran::add');
    $routes->post('create', 'Pengeluaran::create');
    $routes->get('edit/(:any)', 'Pengeluaran::edit/$1');
    $routes->post('edit/(:any)', 'Pengeluaran::edit/$1');
    $routes->post('delete', 'Pengeluaran::delete');
});

// Report routes
$routes->group('jurnal', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Laporan\Jurnal::index');
    $routes->post('(:any)', 'Laporan\Jurnal::show_data_jurnal');
});
$routes->group('buku-besar', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Laporan\BukuBesar::index');
    $routes->post('(:any)', 'Laporan\BukuBesar::show_data_buku_besar');
});
$routes->group('laba-rugi', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Laporan\LabaRugi::index');
    $routes->post('(:any)', 'Laporan\LabaRugi::show_data_laba_rugi');
});

// Rent
$routes->get('detail/(:num)', 'Customer::show/$1');

$routes->post('pemesanan/store', 'PemesananController::store', ['as' => 'pemesanan_store']);
$routes->post('pemesanan/store', 'PemesananController::store');



// Additional routes for environment-specific configs
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
