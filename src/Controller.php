<?php
namespace App;
class Controller {
    protected function render($view_name, $data = []) {
        extract($data); // chuyển phần tử của 1 mảng thành các biến riêng lẻ

        include __DIR__ . "\View\\$view_name.php";
    }
}