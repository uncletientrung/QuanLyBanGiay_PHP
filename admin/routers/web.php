<?php
// Trang chủ
$router->get('/', 'Dashboard@default');
$router->get('/dashboard', 'Dashboard@default');

// Auth
$router->get('/auth/signin', 'Auth@signin');
$router->post('/auth/signin', 'Auth@postSignin');
$router->get('/auth/logout', 'Auth@logout');

// Account
$router->get('/profile', 'Profile@default');
$router->post('/profile/update', 'Profile@update');
$router->post('/profile/change-password', 'Profile@changePassword');

$router->get('/user', 'User@default');
$router->get('/user/getData', 'User@getData');
$router->post('/user/getDetail', 'User@getDetail');
$router->post('/user/add', 'User@add');
$router->post('/user/update', 'User@update');
$router->post('/user/delete', 'User@delete');

// Other
$router->get('/attributes', 'Attributes@default');

$router->get('/products', 'Products@default');

$router->get('/nhap_hang', 'Nhap_hang@default');

$router->get('/don_hang', 'Don_hang@default');

$router->get('/ton_kho', 'Ton_kho@default');

$router->get('/reports', 'Reports@default');
