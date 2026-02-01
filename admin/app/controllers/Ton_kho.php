<?php
class Ton_kho extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "ton_kho",
            "title" => "Quản lý tồn kho"
        ]);
    }
}
