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
$routes->setDefaultController('Home');    //class Name of Controller
$routes->setDefaultMethod('index');      //function name nested in class Name
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Auth Routes
 * --------------------------------------------------------------------
 */

$routes->match(['get', 'post'], 'login', 'Auth::login'); // LOGIN PAGE
$routes->match(['get', 'post'], 'register', 'Auth::register'); // REGISTER PAGE
$routes->match(['get', 'post'], 'forgotpassword', 'Auth::forgotPassword'); // FORGOT PASSWORD
$routes->match(['get', 'post'], 'activate/(:num)/(:any)', 'Auth::activateUser/$1/$2'); // INCOMING ACTIVATION TOKEN FROM EMAIL
$routes->match(['get', 'post'], 'resetpassword/(:num)/(:any)', 'Auth::resetPassword/$1/$2'); // INCOMING RESET TOKEN FROM EMAIL
$routes->match(['get', 'post'], 'updatepassword/(:num)', 'Auth::updatepassword/$1'); // UPDATE PASSWORD
$routes->match(['get', 'post'], 'lockscreen', 'Auth::lockscreen'); // LOCK SCREEN
$routes->get('logout', 'Auth::logout'); // LOGOUT


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Produk::homepage');

/**
 * --------------------------------------------------------------------
 * SUPER ADMIN ROUTES. MUST BE LOGGED IN AND HAVE ROLE OF '1'
 * --------------------------------------------------------------------
 */

$routes->group('', ['filter' => 'auth:Role,1'], function ($routes) {

	$routes->get('superadmin', 'superadmin::index'); // SUPER ADMIN DASHBOARD
	$routes->match(['get', 'post'], 'superadmin/profile', 'Auth::profile'); 

    // this method for add data from form and show data in table 
    // 'Gambar' is class from Gambar.php and 
    // 'save_new' is new function in Gambar.php
    $routes->post('/gambar/add', 'Gambar::save_new');
    // :num will keep the id and past to $1
    $routes->post('/gambar/edit/(:num)', 'Gambar::save_edit/$1');
    $routes->get('/gambar/add', 'Gambar::add');
    $routes->get('/gambar/edit/(:num)', 'Gambar::edit/$1');
    $routes->get('/gambar/delete', 'Gambar::delete/$1');
    $routes->get('/gambar', 'Gambar::index');

    //hanya admin je boleh guna page di atas
    //Gambar is a class 
    // index, delete, edit, save_edit, save new is a function 

    $routes->post('/produk/add', 'Produk::save_new');
    $routes->post('/produk/edit/(:num)', 'Produk::save_edit/$1');
    $routes->get('/produk/add', 'Produk::add');
    $routes->get('/produk/edit/(:num)', 'Produk::edit/$1');
    $routes->get('/produk/slug/(:any)', 'Produk::slug/$1');
    $routes->get('/produk/delete', 'Produk::delete/$1');
    $routes->get('/produk', 'Produk::index');

    //$routes->get('/bakul', 'Bakul::index');


    $routes->post('/kategori/add', 'Kategori::save_new');
    // :num will keep the id and past to $1
    $routes->post('/kategori/edit/(:num)', 'Kategori::save_edit/$1');
    $routes->get('/kategori/add', 'Kategori::add');
    $routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1');
    $routes->get('/kategori/slug/(:any)', 'Kategori::slug/$1');
    $routes->get('/kategori/delete', 'Kategori::delete/$1');
    $routes->get('/kategori', 'Kategori::index');
});


/**
 * --------------------------------------------------------------------
 * ADMIN ROUTES. MUST BE LOGGED IN AND HAVE ROLE OF '2'
 * --------------------------------------------------------------------
 */

$routes->group('', ['filter' => 'auth:Role,2'], function ($routes){

	$routes->get('dashboard', 'Dashboard::index'); // ADMIN DASHBOARD
	$routes->match(['get', 'post'], 'dashboard/profile', 'Auth::profile');

    $routes->post('/produk/add', 'Produk::save_new');
    $routes->post('/produk/edit/(:num)', 'Produk::save_edit/$1');
    //$routes->get('/bakul', 'Bakul::index');

    $routes->post('/kategori/add', 'Kategori::save_new');

    // :num will keep the id and past to $1
    $routes->post('/kategori/edit/(:num)', 'Kategori::save_edit/$1');
});

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
