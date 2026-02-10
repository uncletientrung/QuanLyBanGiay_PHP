<?php
class Router
{
    protected $routers = [];

    public function get($sUrl, $action)
    {
        $this->routers['GET'][$this->formatUrl($sUrl)] = $action;
    }

    public function post($sUrl, $action)
    {
        $this->routers['POST'][$this->formatUrl($sUrl)] = $action;
    }

    // Xoá / thừa
    private function formatUrl($url)
    {
        $url = trim($url, '/');
        return ($url == '') ? '/' : '/' . $url;
    }

    public function xulyPath($method, $url)
    {
        $url = str_replace(APP_ADMIN_PATH, '', $url);
        $url = $this->formatUrl($url);

        $urlParts = explode('/', trim($url, '/'));
        if (isset($this->routers[$method][$url])) {
            $this->execute($this->routers[$method][$url]);
            return;
        }

        // Params
        $checkUrl = ($urlParts[0] == '') ? '/' : '/' . $urlParts[0];
        if (isset($this->routers[$method][$checkUrl])) {
            $callback = $this->routers[$method][$checkUrl];
            unset($urlParts[0]);
            $params = array_values($urlParts);
            $this->execute($callback, $params);
            return;
        }

        // else
        $this->execute("Myerror@default");
    }

    private function execute($callback, $params = [])
    {
        $arr = explode('@', $callback);
        $controllerName = $arr[0];
        $actionName = $arr[1];

        $fileController = dirname(__DIR__) . "/controllers/" . $controllerName . ".php";

        if (file_exists($fileController)) {
            require_once $fileController;
            $controller = new $controllerName;

            if (method_exists($controller, $actionName)) {
                call_user_func_array([$controller, $actionName], $params);
            } else {
                $this->execute("Myerror@default");
            }
        } else {
            $this->execute("Myerror@default");
        }
    }
}
