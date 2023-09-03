<?php

use CodeIgniter\Router\RouteCollection;


// Create a new instance of our RouteCollection class.


/**
 * @var RouteCollection $routes
 */

//komik beranda ambil semua data
$routes->get('/', 'KomikController::index');

//menuju form tambah
$routes->get('/komik/create','KomikController::create');

//komik save
$routes->post('/komik/save','KomikController::save');

//komik hapus
$routes->delete('/komik/(:num)','KomikController::delete/$1');

//komik ke halaman edit
$routes->get('/komik/edit/(:segment)','KomikController::edit/$1');

//komik proses update
$routes->post('/komik/update/(:segment)','KomikController::update/$1');

//komik detail
$routes->get('/komik/(:any)','KomikController::detail/$1');



