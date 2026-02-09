<?php
class Profile extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "profile",
            "title" => "Trang cá nhân"
        ]);
    }
}
