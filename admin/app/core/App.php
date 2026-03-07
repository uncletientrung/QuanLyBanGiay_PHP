<?php
class App
{
    function __construct()
    {
        if (!isset($_SESSION['admin_logged']) && isset($_COOKIE['admin_token'])) {
            require_once MODEL_PATH_DIR . 'AdminModel.php';
            global $conn;
            $adminModel = new AdminModel($conn);
            $adminModel->validateToken($_COOKIE['admin_token']);
        }

        require_once "Router.php";
        $router = new Router();
        require_once dirname(dirname(__DIR__)) . "/routers/web.php";

        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $router->xulyPath($method, $url);
    }
}
