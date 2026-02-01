<?php
class Don_hang extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "don_hang",
            "title" => "Quản lý đơn hàng"
        ]);
    }
}
