<?php
class Dashboard  extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "dashboard",
            "title" => "Trang chủ Admin",
            "Plugin" => [
                "slick" => 1,
                "notify" => 1,
            ],
            "Script" => "dashboard"
        ]);
    }
}
