<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// DATA SISWA
$routes->get('data-siswa', 'SiswaController::index');
$routes->post('data-siswa/add', 'SiswaController::add');
$routes->post('data-siswa/update/(:num)', 'SiswaController::update/$1');
$routes->get('data-siswa/delete/(:num)', 'SiswaController::delete/$1');

// DATA MATPEL
$routes->get('data-matpel', 'MatpelController::index');
$routes->post('data-matpel/add', 'MatpelController::add');
$routes->post('data-matpel/update/(:num)', 'MatpelController::update/$1');
$routes->get('data-matpel/delete/(:num)', 'MatpelController::delete/$1');

// DATA UJIAN
$routes->get('data-ujian', 'UjianController::index');
$routes->post('data-ujian/add', 'UjianController::add');
// $routes->get('data-ujian/filter', 'UjianController::filter');
$routes->post('data-ujian/update/(:num)', 'UjianController::update/$1');
$routes->get('data-ujian/delete/(:num)', 'UjianController::delete/$1');

// DATA PESERTA
$routes->get('data-peserta', 'PesertaController::index');
$routes->post('data-peserta/add', 'PesertaController::add');
$routes->post('data-peserta/update/(:num)', 'PesertaController::update/$1');
$routes->get('data-peserta/delete/(:num)', 'PesertaController::delete/$1');

// FIBONACCI
$routes->get('fibonacci', 'Home::fibo');
$routes->get('fibonacci/tampil', 'Home::fibonacci');