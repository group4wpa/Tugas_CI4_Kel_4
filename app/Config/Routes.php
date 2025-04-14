<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes Login
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::login_action');
$routes->get('/logout', 'Login::logout');

// Routes Register
$routes->get('/register', 'Auth::showRegisterForm'); // Halaman form register
$routes->post('/register', 'Auth::registerAction'); // Aksi register

// Routes User
$routes->get('/user/dashboard', 'User::dashboard', ['filter' => 'auth']);
$routes->get('/user/profile', 'User::profile', ['filter' => 'auth']);
$routes->get('/user/pemesanan', 'User::pemesanan');
$routes->post('/pesan/simpan', 'User::simpanPemesanan');

$routes->get('/user/order/(:segment)', 'Order::form/$1');
$routes->get('/user/history', 'User::history', ['filter' => 'auth']);

// Routes Admin
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'auth']);
$routes->get('/admin/pelanggan', 'Admin::pemesanan', ['filter' => 'auth']);
$routes->get('/admin/pemesanan', 'Admin::pemesanan', ['filter' => 'auth']);
$routes->get('/admin/hapus/(:num)', 'Admin::hapus/$1', ['filter' => 'auth']);

$routes->get('/admin/data_pelanggan/index', 'Admin::dataPelanggan');


// Routes Profile Update
$routes->get('/user/profile', 'User::profile', ['filter' => 'auth']);
$routes->post('/user/profile/update', 'User::update', ['filter' => 'auth']);
