<?php
class App
{
    protected $controller = "Dashboard";
    protected $action = "default";
    protected $params = [];


    function __construct()
    {
        $arr = $this->UrlProcess();

        // Controller
        if ($arr != NULL) {
            $controllerName = ucfirst($arr[0]);
            if (file_exists(dirname(__DIR__) . "/controllers/" . $controllerName . ".php")) {
                $this->controller = $controllerName;
                unset($arr[0]);
            } else {
                $this->controller = 'Myerror';
            }
        }

        require_once dirname(__DIR__) . "/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // Action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            } else {
                require_once dirname(__DIR__) . "/controllers/Myerror.php";
                $this->controller = new Myerror();
                $this->action = 'default';
            }
            unset($arr[1]);
        }
        // Params
        $this->params = $arr ? array_values($arr) : [];
        try {
            call_user_func_array([$this->controller, $this->action], $this->params);
        } catch (ArgumentCountError $e) {
            $this->controller = 'myerror';
            require_once dirname(__DIR__) . "/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            $this->action = 'default';
            call_user_func_array([$this->controller, $this->action], []);
        }
    }

    function UrlProcess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
