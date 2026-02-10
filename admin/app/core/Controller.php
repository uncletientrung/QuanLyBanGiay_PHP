<?php
class Controller
{
    public function model($model)
    {
        if (file_exists(MODEL_PATH_DIR . $model . '.php')) {
            require_once  MODEL_PATH_DIR . $model . '.php';
            if (class_exists($model)) {
                return new $model;
            }
        }
        return false;
    }

    public function renderView($view, $data = [])
    {
        extract($data);
        if (file_exists(VIEW_PATH_ADMIN_DIR . $view . '.php')) {
            require_once  VIEW_PATH_ADMIN_DIR . $view . '.php';
        }
    }
}
