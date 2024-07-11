<?php
namespace App\Controller;

use App\Model\HoaDonModel;
use App\Controller;

class HoaDonController extends Controller{
    private $HoaDonModel;

    public function __construct()
    {
        $this->HoaDonModel = new HoaDonModel();
    }

    
    public function create(){
        session_start();
        if(isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser'])){
            $idgio = $_POST['idgio'];
            $xoaGio = $this->HoaDonModel->deleteGioHang($idgio);
            $currentUser = $_SESSION['currentUser'];
            $ngayMua = date('Y-m-d');
            $hoadon = $this->HoaDonModel->createHoaDon($currentUser['idkhachHang'], $ngayMua);
            $idhoaDonNew = $this->HoaDonModel->getIDHoaDonLonNhat();
            $chiTietHoaDon = $this->HoaDonModel->createChiTietHoaDon($_POST['soLuongMua'],$_POST["idhangHoa"], $idhoaDonNew->fetch_assoc()['idhoaDonNew']);
            if ($hoadon) {
                // Redirect to the user list page or show a success message
                header('Location: /lichSu');
                exit();
            } else {
                // Handle the case where the user creation failed
                echo 'Không thể tạo hoá đơn.';
            }
        } else{
            header("Location: /index.php");
            exit();
        } 
            
    }
    public function xacNhanHoaDon(){
        $xacNhan = $this->HoaDonModel->updateHoaDon($_POST['idchiTietHoaDon'], 1);
        if($xacNhan == 1){
            $this->HoaDonModel->xuLyKhiXacNhanHetChiTiet($_POST['idhoaDon']);
            header('Location: /admin/xacNhanHoaDonIndex');
        }else{
            echo 'Xác nhận thất bại';
        }
    }
}
?>