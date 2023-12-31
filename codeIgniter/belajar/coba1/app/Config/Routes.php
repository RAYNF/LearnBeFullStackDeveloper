<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
//auto route
// $routes->setAutoRoute(true);
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

//1. latihan routing
//-------------------------------------------------------
//harus didefinisikan nama controler/method nya 
// $routes->get('/', 'Home::index');

// $routes->get('/home/oke', 'Home::oke');

// $routes->get('/coba', 'Coba::index');
// $routes->get('/coba/about', 'Coba::about');

//membuat anonymous fungsi agar langsung di eksekusi
// $routes->get('/coba',function(){
//     echo "anonymous";
// });

//mengirimkan data sebagai parameter
// $routes->get('/coba/about', 'Coba::about');

//place holder(apapun yang diketikan user akan ditangkap semua)
//pada controler about akan menangkap nilai pertama dari place holder
// $routes->get('/coba/(:any)', 'Coba::about/$1');

//kalau ada akses ke user, arahkan namespace admin controller user method index
// $routes->get('/user', 'Admin\user::index');

//-----------------------------------------------------------------

$routes->get('/', 'PagesController::index');
$routes->get('/pages/about','PagesController::about');
$routes->get('/pages/contact','PagesController::contact');

// komik beranda
$routes->get('/komik/index','KomikController::index');
//komik create form
$routes->get('/komik/create','KomikController::create');

//komik save
// karena di form menggunakan method post, maka route nya mengikuti
$routes->post('/komik/save','KomikController::save');

//komik delete metode lama
$routes->get('/komik/delete/(:segment)','KomikController::delete/$1');

//komik delete metode http agar aman 
$routes->delete('/komik/(:num)','KomikController::delete/$1');

//komik edit ke halaman form
$routes->get('/komik/edit/(:segment)','KomikController::edit/$1');

//komik edit proses
$routes->post('/komik/update/(:segment)','KomikController::update/$1');

//jika ada user yang mengakses komik / apapun, kirimkan ke controller komik method detail dan mengirimkan sengmen
$routes->get('/komik/(:any)','KomikController::detail/$1');



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
