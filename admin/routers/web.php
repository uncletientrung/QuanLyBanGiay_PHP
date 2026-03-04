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

// Thuoc tinh
$router->get('/brands', 'Brands@default');
$router->get('/brands/getData', 'Brands@getData');

$router->get('/categories', 'Categories@default');
$router->get('/categories/getData', 'Categories@getData');

$router->get('/colors', 'Colors@default');
$router->get('/colors/getData', 'Colors@getData');

$router->get('/sizes', 'Sizes@default');
$router->get('/sizes/getData', 'Sizes@getData');

$router->get('/suppliers', 'Suppliers@default');

// San pham
$router->get('/products', 'Products@default');

// Kho hang
$router->get('/nhap_hang', 'Nhap_hang@default');

// Don hang
$router->get('/don_hang', 'Don_hang@default');
$router->get('/don_hang/getData', 'Don_hang@getData');

$router->get('/ton_kho', 'Ton_kho@default');

$router->get('/reports', 'Reports@default');
