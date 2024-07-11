<?php
namespace App\Controller;

use App\Model\KhachHangModel;
use App\Controller;

class KhachHangController extends Controller{   // kế thừa hàm render ở controller
    private $khachHangModel;
    // hàm tạo -> tạo ra 1 class khachHangModel
    public function __construct()
    {
        $this->khachHangModel = new KhachHangModel();
    }

    public function index(){
        $this->render('Auth\index', []); // hàm này kế thừa ở controller
    }
    public function indexRegister(){
        $this->render('Auth\register', []);
    }
    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['matKhau'] != $_POST['xacNhanMatKhau']){
                echo 'Bạn đã nhập sai mật khẩu xác nhận';
                return;
            }
             $khachHang = $this->khachHangModel->createKhachHang($_POST['hoTen'], $_POST['taiKhoan'], $_POST['matKhau'],$_POST['email'],$_POST['SDT'],$_POST['diaChi']);
             if($khachHang){
                $khachHangRegisted = $this->khachHangModel->getOneKhachHangByUserName($_POST['taiKhoan']);
                session_start();
                $_SESSION['currentUser'] = $khachHangRegisted;
                header("Location: /home");
                exit();
             }else{
                echo "Đăng ký thất bại";
             }
        }
    }
    public function login(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $taiKhoan = $_POST['taiKhoan'];
            $matKhau = $_POST['matKhau'];
        $khachHang = $this->khachHangModel->getOneKhachHangByUserName($taiKhoan);
        if($khachHang && password_verify($matKhau,$khachHang['matKhau'])){
            if($khachHang && $khachHang['taiKhoan'] == 'admin'){
                session_start();
                $_SESSION['currentUser'] = $khachHang;
                header("Location: /admin");
                exit();
            }
            if($khachHang){
                session_start();
                $_SESSION['currentUser'] = $khachHang;
                header("Location: /home");
                exit();
            }
            }else {
                header("Location: /");
                exit();
            }
        }
        
    }
    public function indexAdmin(){
        session_start();
        if(isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser']) && $_SESSION['currentUser']['taiKhoan'] == 'admin'){
            if(isset($_POST['nam'])){
                $thongke = $this->khachHangModel->getAllHoaDonAdminThongKe($_POST['nam']);
            }else{
                $namHienTai = date("Y");
                $thongke = $this->khachHangModel->getAllHoaDonAdminThongKe($namHienTai);
            }
            $this->render('/Admin/thongkeAdmin', ['thongke' => $thongke]);
        } else{
            header("Location: /index.php");
            exit();
        } 
            
    }
    
 

    public function logout(){
            session_start();
            if(isset($_SESSION['currentUser'])){
                unset($_SESSION['currentUser']);
                session_destroy();
                header("Location: /");
                exit();
            }
    }
    
}
?>