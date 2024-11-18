<?php

$routes->get('/', 'Home::index');

// Login routes
$routes->get('login', 'LoginController::index'); // Menampilkan halaman login
$routes->post('login/authenticate', 'LoginController::authenticate'); // Memproses login
$routes->get('logout', 'LoginController::logout'); // Memproses logout


// Dashboard routes
$routes->get('/dashboard_admin', 'Dashboard::admin');
$routes->get('/dashboard_user', 'Dashboard::user');

// Admin and User dashboard
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('user/dashboard', 'UserController::dashboard');

// Rute untuk Kriteria
$routes->get('list-kriteria', 'Kriteria::index'); // Menampilkan daftar kriteria
$routes->get('tambah-kriteria', 'Kriteria::tambahKriteria'); // Halaman tambah kriteria
$routes->post('tambah-kriteria', 'Kriteria::tambahKriteria'); // Proses simpan kriteria
$routes->get('edit-kriteria/(:num)', 'Kriteria::editKriteria/$1'); // Halaman edit kriteria
$routes->post('edit-kriteria/(:num)', 'Kriteria::editKriteria/$1'); // Proses update kriteria
$routes->get('hapus-kriteria/(:num)', 'Kriteria::hapusKriteria/$1'); // Proses hapus kriteria

// Alternatif routes
$routes->get('list-alternatif', 'Alternatif::index');
$routes->get('tambah-alternatif', 'Alternatif::tambahView'); // Menampilkan form tambah alternatif
$routes->post('alternatif/tambah', 'Alternatif::tambah'); // Menyimpan alternatif baru
$routes->get('edit-alternatif/(:num)', 'Alternatif::edit/$1'); // Menampilkan form edit
$routes->post('edit-alternatif/(:num)', 'Alternatif::update/$1'); // Mengupdate alternatif
$routes->get('hapus-alternatif/(:num)', 'Alternatif::hapus/$1'); // Menghapus alternatif

//penilaian routes

$routes->get('list-penilaian', 'Penilaian::index');
$routes->get('penilaian/edit/(:any)', 'Penilaian::edit/$1');
$routes->post('penilaian/update', 'Penilaian::update');
$routes->get('penilaian/hapus/(:any)', 'Penilaian::hapus/$1');

//perhitungan routes
$routes->get('/perhitungan', 'Perhitungan::index',); 

//routes hasil
$routes->get('/hasil', 'Hasil::index'); // Rute untuk halaman hasil

$routes->get('hasil_akhir', 'HasilAkhir::index');


//routes user
$routes->get('user', 'User::index');
$routes->get('user/create', 'User::create');
$routes->post('user/store', 'User::store');
$routes->get('user/edit/(:num)', 'User::edit/$1');
$routes->post('user/update/(:num)', 'User::update/$1');
$routes->get('user/delete/(:num)', 'User::delete/$1');

