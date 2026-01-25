<?php
class Controller
{
    public function model($model)
    {
        if (file_exists(dirname(__DIR__) . '/models/' . $model . '.php')) {
            require_once  dirname(__DIR__) . '/models/' . $model . '.php';
            if (class_exists($model)) {
                return new $model;
            }
        }
        return false;
    }

    public function renderView($view, $data = [])
    {
        extract($data);
        if (file_exists(dirname(__DIR__) . '/views/admin/' . $view . '.php')) {
            require_once  dirname(__DIR__) . '/views/admin/' . $view . '.php';
        }
    }
}
