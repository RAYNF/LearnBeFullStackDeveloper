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

//komik detail
$routes->get('/komik/(:any)','KomikController::detail/$1');

//komik hapus
$routes->delete('/komik/(:num)','KomikController::delete/$1');

