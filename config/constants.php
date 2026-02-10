<?php
session_start();
define('ROOT_URL', 'http://localhost/QuanLyBanGiay_Php/');
define('ROOT_URL_ADMIN', 'http://localhost/QuanLyBanGiay_Php/admin/');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'quanlybangiay');

define("APP_PATH", "/QuanLyBanGiay_Php/");
define("APP_ADMIN_PATH", "/QuanLyBanGiay_Php/admin/");

define('APP_PATH_DIR', __DIR__ . '/../app/');
define('APP_ADMIN_PATH_DIR', __DIR__ . '/../admin/app/');

define('VIEW_PATH_DIR', APP_PATH_DIR . 'views/');
define('VIEW_PATH_ADMIN_DIR', APP_ADMIN_PATH_DIR . 'views/');

define('MODEL_PATH_DIR', APP_PATH_DIR . 'models/');

define('IMAGE_PATH_DIR', 'public/img/');
define('NO_IMAGE', 'public/images/no-image');
