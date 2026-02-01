<?php
class Attributes extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "attributes",
            "title" => "Quản lý thuộc tính"
        ]);
    }
}
