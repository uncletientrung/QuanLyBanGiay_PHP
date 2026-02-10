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

    // Hàm phụ để chuẩn hóa URL (xóa dấu / thừa)
    private function formatUrl($url)
    {
        $url = trim($url, '/');
        return ($url == '') ? '/' : '/' . $url;
    }

    public function xulyPath($method, $url)
    {
        $basePath = '/QuanLyBanGiay_Php/admin';
        $url = str_replace($basePath, '', $url);
        $url = $this->formatUrl($url);

        // Tách URL thành mảng để tìm params giống App cũ
        $urlParts = explode('/', trim($url, '/'));

        // 1. Kiểm tra khớp URL hoàn toàn (Ví dụ: /login, /products)
        if (isset($this->routers[$method][$url])) {
            $this->execute($this->routers[$method][$url]);
            return;
        }

        // 2. Nếu không khớp hoàn toàn, thử kiểm tra khớp phần đầu (để lấy params)
        // Ví dụ: Bạn khai báo /user nhưng khách vào /user/edit/1
        $checkUrl = ($urlParts[0] == '') ? '/' : '/' . $urlParts[0];
        if (isset($this->routers[$method][$checkUrl])) {
            $callback = $this->routers[$method][$checkUrl];
            unset($urlParts[0]); // Xóa phần controller đã khớp
            $params = array_values($urlParts); // Các phần còn lại là params
            $this->execute($callback, $params);
            return;
        }

        // 3. Nếu không khớp gì cả -> Chạy trang lỗi
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
                // Gọi hàm và truyền params vào y hệt App cũ
                call_user_func_array([$controller, $actionName], $params);
            } else {
                $this->execute("Myerror@default");
            }
        } else {
            $this->execute("Myerror@default");
        }
    }
}
