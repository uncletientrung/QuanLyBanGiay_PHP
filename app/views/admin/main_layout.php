<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Quản lý cửa hàng giày</title>
    <link rel="stylesheet" id="css-main" href="<?php echo APP_PATH; ?>public/css/dashmix.min.css">
    <link rel="stylesheet" href="<?php echo APP_PATH; ?>public/css/custom.css">
    <script src="<?php echo APP_PATH; ?>public/js/lib/jquery.min.js"></script>
</head>

<body>
    <div id="page-container" class="sidebar-o sidebar-light enable-page-overlay side-scroll page-header-fixed main-content-narrow">

        <!-- SIDEBAR -->
        <?php
        // Truyền biến $page cho sidebar để active đúng menu
        $current_page = isset($page) ? $page : 'dashboard';
        include "partials/sidebar.php";
        ?>

        <!-- HEADER -->
        <?php include "partials/header.php"; ?>

        <!-- MAIN CONTENT -->
        <main id="main-container">
            <div class="content">
                <?php
                // Đường dẫn đầy đủ đến file trang
                $page_path = __DIR__ . "/pages/" . $page . ".php";

                if (file_exists($page_path)) {
                    include_once $page_path;
                } else {
                    echo "<div class='alert alert-danger'>Trang không tồn tại!</div>";
                }
                ?>
            </div>
        </main>

    </div>

    <!-- SCRIPTS -->
    <script src="<?php echo APP_PATH; ?>public/js/dashmix.app.min.js"></script>
</body>

</html>