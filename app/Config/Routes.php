<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Dashboard
$routes->get('/', 'Home::index');
$routes->get('already_healthy/(:num)','Home::already_healthy/$1');
$routes->get('already_healthy_by_askes/(:num)','Home::already_healthy_by_askes/$1');
$routes->post('choose_isoman','Home::choose_isoman');

// Auth
$routes->get('login','Auth::index');
$routes->post('do_login','Auth::login');

// Keluhan
$routes->get('keluhan_page','Keluhan::index');
$routes->get('data_keluhan_page','Keluhan::data_keluhan');
$routes->get('modal_beri_penanganan/(:num)','Keluhan::modal_beri_penanganan/$1');
$routes->post('add_keluhan','Keluhan::add_keluhan');

// Penanganan
$routes->post('add_penanganan','Penanganan::add_penanganan');
$routes->post('update_penanganan','Penanganan::update_penanganan');


// Obat 
$routes->get('hapus_obat/(:num)','Penanganan::hapus_obat/$1');






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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
