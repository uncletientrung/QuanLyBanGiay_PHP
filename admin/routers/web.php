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
$router->post('/user/checkExists', 'User@checkExists');

// Thuoc tinh
$router->get('/brands', 'Brands@default');
$router->get('/brands/getData', 'Brands@getData');
$router->post('/brands/add', 'Brands@add');
$router->post('/brands/delete', 'Brands@delete');
$router->post('/brands/update', 'Brands@update');
$router->post('/brands/show', 'Brands@show');

$router->get('/categories', 'Categories@default');
$router->get('/categories/getData', 'Categories@getData');
$router->post('/categories/add', 'Categories@add');
$router->post('/categories/delete', 'Categories@delete');
$router->post('/categories/update', 'Categories@update');
$router->post('/categories/show', 'Categories@show');

$router->get('/colors', 'Colors@default');
$router->get('/colors/getData', 'Colors@getData');
$router->post('/colors/add', 'Colors@add');
$router->post('/colors/delete', 'Colors@delete');
$router->post('/colors/update', 'Colors@update');
$router->post('/colors/show', 'Colors@show');

$router->get('/sizes', 'Sizes@default');
$router->get('/sizes/getData', 'Sizes@getData');
$router->get('/sizes/getDataByProd', 'Sizes@getDataByProd');
$router->post('/sizes/add', 'Sizes@add');
$router->post('/sizes/delete', 'Sizes@delete');
$router->post('/sizes/show', 'Sizes@show');

$router->get('/suppliers', 'Suppliers@default');
$router->get('/suppliers/getData', 'Suppliers@getData');
$router->post('/suppliers/delete', 'Suppliers@delete');
$router->post('/suppliers/show', 'Suppliers@show');
$router->post('/suppliers/add', 'Suppliers@add');
$router->post('/suppliers/update', 'Suppliers@update');

// San pham
$router->get('/products', 'Products@default');
$router->get('/products/getData', 'Products@getData');
$router->post('/products/delete', 'Products@delete');
$router->post('/products/updateInfo', 'Products@updateInfo');
$router->post('/products/addNewProd', 'Products@addNewProd');
$router->post('/products/updateSizeAndStock', 'Products@updateSizeAndStock');
$router->post('/products/deleteSizeAndStock', 'Products@deleteSizeAndStock');
$router->post('/products/addNewSize', 'Products@addNewSize');
$router->get('/products/getIdAndName', 'Products@getIdAndName');
$router->post('/products/checkDuplicateName', 'Products@checkDuplicateName');

$router->post('/products/upload', 'Products@upload');
$router->post('/products/setBanner', 'Products@setBanner');
$router->post('/products/deleteImage', 'Products@deleteImage');

// Nhap hang
$router->get('/nhap_hang', 'Nhap_hang@default');
$router->get('/nhap_hang/getData', 'Nhap_hang@getData');
$router->post('/nhap_hang/getDetail', 'Nhap_hang@getDetail');
$router->get('/nhap_hang/add',  'Nhap_hang@add');
$router->post('/nhap_hang/add', 'Nhap_hang@add');
$router->post('/nhap_hang/update', 'Nhap_hang@update');
$router->post('/nhap_hang/delete', 'Nhap_hang@delete');

// Don hang
$router->get('/don_hang', 'Don_hang@default');
$router->get('/don_hang/getData', 'Don_hang@getData');
$router->post('/don_hang/getDetail', 'Don_hang@getDetail');
$router->post('/don_hang/updateStatus', 'Don_hang@updateStatus');
$router->post('/don_hang/updateBulkStatus', 'Don_hang@updateBulkStatus');
$router->post('/don_hang/delete', 'Don_hang@delete');

// Gia ban
$router->get('/gia_ban', 'GiaBan@default');
$router->post('/gia_ban/updateLoiNhuan', 'GiaBan@updateLoiNhuan');

// Ton kho
$router->get('/ton_kho', 'Ton_kho@default');
$router->get('/ton_kho/getAllStock', 'Ton_kho@getAllStock');
$router->get('/ton_kho/getStockById', 'Ton_kho@getStockById');
$router->get('/ton_kho/getThongKeNhapXuat', 'Ton_kho@getThongKeNhapXuat');
$router->get('/ton_kho/getChiTietThongKe', 'Ton_kho@getChiTietThongKe');
$router->get('/ton_kho/getTotalStockByDateAndId', 'Ton_kho@getTotalStockByDateAndId');
$router->get('/ton_kho/getList', 'Ton_kho@getList');

// Thong ke
$router->get('/reports', 'Reports@default');
$router->get('/reports/getSummaryData', 'Reports@getSummaryData');
