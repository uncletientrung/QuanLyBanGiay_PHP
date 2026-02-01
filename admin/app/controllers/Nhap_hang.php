<?php
class Nhap_hang extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "nhap_hang",
            "title" => "Nhập hàng"
        ]);
    }
}
