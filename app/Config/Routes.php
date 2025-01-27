<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Ubah ke Home Controller
$routes->get('/user', 'UserDashboard::index'); // Tambah route user dashboard
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('gamelibrary', 'GameLibrary::index');
$routes->get('/create', 'GameLibrary::create');
$routes->post('gamelibrary/store', 'GameLibrary::store');
$routes->post('/gamelibrary/update', 'GameLibrary::update');
$routes->get('/gamelibrary/delete/(:num)', 'GameLibrary::delete/$1');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->get('/logout', 'Auth::logout');
// Tambahkan 2 route ini:
$routes->get('/register', 'Auth::register');
$routes->post('/auth/processRegister', 'Auth::processRegister');
$routes->get('auth/logout', 'Auth::logout');