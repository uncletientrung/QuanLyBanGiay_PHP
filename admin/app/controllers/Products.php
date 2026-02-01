<?php
class Products extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "products",
            "title" => "Quản lý sản phẩm"
        ]);
    }
}
