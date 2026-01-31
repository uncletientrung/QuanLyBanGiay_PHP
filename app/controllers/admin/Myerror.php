<?php
class Myerror extends Controller
{

    public function default()
    {
        $this->renderView("simple_layout", [
            "page" => "error/error_404",
            "title" => "Lỗi !"
        ]);
    }
}
