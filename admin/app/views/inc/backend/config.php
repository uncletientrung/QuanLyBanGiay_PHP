<?php

/**
 * backend/config.php
 *
 * Author: pixelcave
 *
 * Backend pages configuration file
 *
 */

// **************************************************************************************************
// INCLUDED VIEWS
// **************************************************************************************************

$dm->inc_side_overlay           = __DIR__ . '/views/inc_side_overlay.php';
$dm->inc_sidebar                = __DIR__ . '/views/inc_sidebar.php';
$dm->inc_header                 = __DIR__ . '/views/inc_header.php';
$dm->inc_footer                 = __DIR__ . '/views/inc_footer.php';


// **************************************************************************************************
// SIDEBAR
// **************************************************************************************************

$dm->l_sidebar_dark             = false;


// **************************************************************************************************
// HEADER
// **************************************************************************************************

$dm->l_header_style             = 'light';


// **************************************************************************************************
// MAIN CONTENT
// **************************************************************************************************

$dm->l_m_content                = 'narrow';


// **************************************************************************************************
// MAIN MENU
// **************************************************************************************************

$dm->main_nav                   = array(
    array(
        'name'  => 'Dashboard',
        'icon'  => 'fa fa-location-arrow',
        // 'badge' => array(8, 'primary'),
        'url'   => APP_PATH . 'admin/dashboard/'
    ),
    array(
        'name'  => 'TÀI KHOẢN',
        'type'  => 'heading'
    ),
    array(
        'name'  => 'Người dùng',
        'icon'  => 'fa-solid fa-users',
        'url'   => APP_PATH . 'admin/user'
    ),
    array(
        'name'  => 'QUẢN LÝ',
        'type'  => 'heading'
    ),
    array(
        'name'  => 'Thuộc tính',
        'icon'  => 'fa fa-flask',
        'url'   => APP_PATH . 'admin/attributes'
    ),
    array(
        'name'  => 'Sản phẩm',
        'icon'  => 'fa fa-grip-horizontal',
        'url'   => APP_PATH . 'admin/products'
    ),
    array(
        'name'  => 'Nhập hàng',
        'icon'  => 'fa fa-sticky-note',
        'url'   => APP_PATH . 'admin/nhap_hang'
    ),
    array(
        'name'  => 'Đơn hàng',
        'icon'  => 'fa fa-cog',
        'url'   => APP_PATH . 'admin/don_hang'
    ),
    array(
        'name'  => 'Tồn kho',
        'icon'  => 'fa fa-wrench',
        'url'   => APP_PATH . 'admin/ton_kho'
    ),
    array(
        'name'  => 'BÁO CÁO',
        'type'  => 'heading'
    ),
    array(
        'name'  => 'Thống kê',
        'icon'  => 'fa fa-rocket',
        'url'   => APP_PATH . 'admin/reports'
    ),
);
