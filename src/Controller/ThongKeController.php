<?php
namespace App\Controller;

use App\Model\HoaDonModel;
use App\Controller;

class ThongKeController extends Controller{
    private $HoaDonModel;

    public function __construct()
    {
        $this->HoaDonModel = new HoaDonModel();
    }

    
    public function index(){
        session_start();
        if(isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser']) && $_SESSION['currentUser']['taiKhoan'] == 'admin'){
            $currentUser = $_SESSION['currentUser'];
            if(isset($_POST['nam'])){
                $thongke = $this->HoaDonModel->getAllHoaDonAdminThongKe($_POST['nam']);
            }else{
                $namHienTai = date("Y");
                $thongke = $this->HoaDonModel->getAllHoaDonAdminThongKe($namHienTai);
            }
            $this->render('/Admin/thongkeAdmin', ['thongke' => $thongke]);
        } else{
            header("Location: /index.php");
            exit();
        } 
            
    }
}
?>