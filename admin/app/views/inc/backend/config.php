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
        'icon'  => 'fa fa-tags',
        'url'   => APP_PATH . 'admin/attributes'
        // 'sub'   => array(
        //     array(
        //         'name'  => 'Dashboard',
        //         'url'   => 'be_pages_jobs_dashboard.php'
        //     ),
        //     array(
        //         'name'  => 'Listing',
        //         'url'   => 'be_pages_jobs_listing.php'
        //     ),
        //     array(
        //         'name'  => 'Apply',
        //         'url'   => 'be_pages_jobs_apply.php'
        //     ),
        //     array(
        //         'name'  => 'Post',
        //         'url'   => 'be_pages_jobs_post.php'
        //     )
        // )
    ),
    array(
        'name'  => 'Sản phẩm',
        'icon'  => 'fa fa-boot',
        'url'   => APP_PATH . 'admin/products'
    ),
    array(
        'name'  => 'Nhập hàng',
        'icon'  => 'fa fa-truck-ramp-box',
        'url'   => APP_PATH . 'admin/nhap_hang'
    ),
    array(
        'name'  => 'Đơn hàng',
        'icon'  => 'fa fa-basket-shopping',
        'url'   => APP_PATH . 'admin/don_hang'
    ),
    array(
        'name'  => 'Tồn kho',
        'icon'  => 'fa fa-warehouse',
        'url'   => APP_PATH . 'admin/ton_kho'
    ),
    array(
        'name'  => 'BÁO CÁO',
        'type'  => 'heading'
    ),
    array(
        'name'  => 'Thống kê',
        'icon'  => 'fa fa-chart-simple',
        'url'   => APP_PATH . 'admin/reports'
    ),
);
