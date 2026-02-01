<?php
class Reports extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "reports",
            "title" => "Thống kê"
        ]);
    }
}
