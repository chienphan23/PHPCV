<?php

use App\Router;
use App\Controller\HangHoaController;
use App\Controller\GioHangController;
use App\Controller\KhachHangController;
use App\Controller\LichSuController;
use App\Controller\HoaDonController;
use App\Controller\ThongKeController;

// Usage:
$router = new Router();


$router->addRoute('/\//', [new KhachHangController(), 'index']);
$router->addRoute('/\/user\/showRegister/', [new KhachHangController(), 'indexRegister']);
$router->addRoute('/\/user\/register/', [new KhachHangController(), 'register']);
$router->addRoute('/\/user\/logout/', [new KhachHangController(), 'logout']);
$router->addRoute('/\/user\/login/', [new KhachHangController(), 'login']);

$router->addRoute('/\/home/', [new HangHoaController(), 'index']);
$router->addRoute('/\/home\/(\d+)/', [new HangHoaController(), 'detail']);
$router->addRoute('/\/home\/search/', [new HangHoaController(), 'indexSearch']);
$router->addRoute('/\/home\/filter/', [new HangHoaController(), 'indexFilter']);

$router->addRoute('/\/gioHang/' , [new GioHangController(), 'index']);
$router->addRoute('/\/gioHang\/create/' , [new GioHangController(), 'create']);
$router->addRoute('/\/gioHang\/buy/', [new HoaDonController(), 'create']);
$router->addRoute('/\/gioHang\/SuaSoLuong/', [new GioHangController(), 'updateSoLuong']);
$router->addRoute('/\/gioHang\/delete/', [new GioHangController(), 'deleteGio']);

$router->addRoute('/\/lichSu/', [new LichSuController(), 'index']);

$router->addRoute('/\/admin\/xacNhanHoaDonIndex/', [new LichSuController(), 'indexAdmin']);
$router->addRoute('/\/admin/', [new KhachHangController(), 'indexAdmin']);
$router->addRoute('/\/admin\/themHang/', [new HangHoaController(), 'adminThemHang']);
$router->addRoute('/\/admin\/suaHang/', [new HangHoaController(), 'adminSuaHang']);
$router->addRoute('/\/admin\/hangHoa/', [new HangHoaController(), 'indexAdmin']);
$router->addRoute('/\/admin\/thongKe/', [new ThongKeController(), 'index']);
$router->addRoute('/\/admin\/hangHoa\/(\d+)/', [new HangHoaController(), 'indexAdminSua']);
$router->addRoute('/\/admin\/hangHoa\/xoa\/(\d+)/', [new HangHoaController(), 'indexAdminXoa']);
$router->addRoute('/\/admin\/hoanThanhHoaDon/', [new HoaDonController(), 'xacNhanHoaDon']);





