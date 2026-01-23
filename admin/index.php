<?php
require_once '../config/constants.php';
require_once '../config/connectdb.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$viewContent = $page;

include_once '../app/views/admin/main_layout.php';
