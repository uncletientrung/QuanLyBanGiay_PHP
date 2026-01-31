<?php
class Dashboard  extends Controller
{
    public function default()
    {
        $model = $this->model("ProductModel");
        $msg = $model->getTestMessage();

        $this->renderView("main_layout", [
            "page" => "dashboard",
            "title" => "Trang chủ Admin",
            "test_msg" => $msg
        ]);
    }
}
