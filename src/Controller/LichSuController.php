<?php
namespace App\Controller;

use App\Model\HoaDonModel;
use App\Controller;

class LichSuController extends Controller{
    private $HoaDonModel;

    public function __construct()
    {
        $this->HoaDonModel = new HoaDonModel();
    }

    
    public function index(){
        session_start();
        if(isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser'])){
            $currentUser = $_SESSION['currentUser'];
            $hoadon = $this->HoaDonModel->getAllHoaDon($currentUser['idkhachHang']);
            $this->render('/Client/lichSu/index', ['hoadon' => $hoadon]);
        } else{
            header("Location: /index.php");
            exit();
        } 
            
    }
    public function indexAdmin(){
        session_start();
        if(isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser']) && $_SESSION['currentUser']['taiKhoan'] == 'admin'){
            $currentUser = $_SESSION['currentUser'];
            $hoadonChuaThanhToan = $this->HoaDonModel->getAllHoaDonAdmin(0);
            $hoadonDaThanhToan = $this->HoaDonModel->getAllHoaDonAdmin(1);
            $hoadon = array($hoadonChuaThanhToan ,$hoadonDaThanhToan);
            $this->render('/Admin/xacNhanHoaDonAdmin', ['hoadon' => $hoadon]);
        } else{
            // header("Location: /index.php");
            echo "Bạn không phải admin";
            // exit();
        } 
            
    }
}
?>