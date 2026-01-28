<?php
class HomeController {

    public function index() {
        $productModel = new ProductModel();
        $products = $productModel->get8ProductsHome();

        require VIEW_PATH_DIR . 'partials/header.php';
        require VIEW_PATH_DIR . 'home.php';
        require VIEW_PATH_DIR . 'partials/footer.php';
    }
}
