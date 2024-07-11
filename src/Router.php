<?php
namespace App;

class Router {
    private $routes = [];

    public function addRoute($pattern, $callback) { // pattern: btcq // callback: hàm xử lý trong controller
        $this->routes[$pattern] = $callback;
    }
    
    public function match($uri) {
        uksort($this->routes, function ($a, $b) {
            return strlen($b) - strlen($a);
        });
        foreach ($this->routes as $pattern => $callback) {// tìm ra uri tương ứng trong routes
            if (preg_match($pattern, $uri, $matches)) { // kết quả là 1 / 0, nếu khớp thì kq sẽ được lưu trong matches
                array_shift($matches); // dịch mảng, loại bỏ phần tử đầu tiên  => lấy ra được giá trị param nếu có
                call_user_func_array($callback, $matches);// truyền vào hàm callback với tham số tương ứng là matches
                return;
            }
        }
    }
}
