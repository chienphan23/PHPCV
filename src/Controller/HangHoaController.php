<?php
namespace App\Controller;

use App\Model\HangHoaModel;
use App\Controller;

class HangHoaController extends Controller{
    private $hanghoaModel;

    public function __construct()
    {
        $this->hanghoaModel = new HangHoaModel();
    }
    public function index(){
        $hangHoa = $this->hanghoaModel->getAllHangHoa();
        $this->render('Client/hangHoa/home', ['hangHoa' => $hangHoa]);
    }
    public function indexSearch(){
        if(isset($_POST['tenHangInput'])){
            $hangHoa = $this->hanghoaModel->getHangHoaWithKeySearch($_POST['tenHangInput']);
        $this->render('Client/hangHoa/home', ['hangHoa' => $hangHoa]);
        }else{
            $this->index();
        }
    }
    public function indexFilter(){
        if(isset($_POST['mauInput']) && !empty($_POST['mauInput'])){
            $hangHoa = $this->hanghoaModel->LocHangHoaTheoMau($_POST['mauInput']);
        $this->render('Client/hangHoa/home', ['hangHoa' => $hangHoa]);
        }else{
            $this->index();
        }
    }
    public function indexAdminSua($idhangHoa){
        $hangHoa = $this->hanghoaModel->getOneHangHoa($idhangHoa);
        $this->render('Admin/hangHoaAdminSua', ['hangHoa' => $hangHoa]);
    }
    public function detail($idhangHoa) {
        $hangHoa = $this->hanghoaModel->getOneHangHoa($idhangHoa);
        $this->render('Client/hangHoa/detail', ['hangHoa' => $hangHoa]);
    }
    public function indexAdmin(){
        session_start();
        if(isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser']) && $_SESSION['currentUser']['taiKhoan'] == 'admin'){
        $hangHoa = $this->hanghoaModel->getAllHangHoa();
        $this->render('Admin/hangHoaAdmin', ['hangHoa' => $hangHoa]);
        }else{
            echo "Bạn không phải admin";
        }
    }
    public function indexAdminXoa($idhangHoa){
        $hangHoa = $this->hanghoaModel->deleteHangHoa($idhangHoa);
        if($hangHoa) {
            $this->indexAdmin();
        }else{
            echo "Xoá hàng thất bại";
        }
    }

    public function adminThemHang(){
        $microtime = microtime(true); // Lấy thời gian hiện tại với độ chính xác đến micro giây
        $milliseconds = round($microtime * 1000).".png";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["anh"]) && $_FILES["anh"]["error"] == UPLOAD_ERR_OK) {
             $target_file = dirname(dirname(__DIR__))."\\public\\anhHang\\".$milliseconds;
                echo $target_file;
        // Di chuyển ảnh tải lên vào thư mục đích
        if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
            $hangNew= $this->hanghoaModel->createHangHoa($_POST['tenHang'], $_POST['gia'], "../../../public/anhHang/".$milliseconds, $_POST['mau']);
            if ($hangNew) {
                $this->indexAdmin();
                // header('Location: /admin/hangHoa');
                // exit();
            } else {
                echo 'Thêm hàng thất bại.';
            }
        } else {
            echo "Có lỗi khi tải ảnh lên.";
        }
    } else {
        echo "Vui lòng chọn một tệp ảnh để tải lên.";
    }
}
}

    public function adminSuaHang(){
        echo $_POST['tenHang']. $_POST['gia']. $_POST['mau'];
        $microtime = microtime(true); // Lấy thời gian hiện tại với độ chính xác đến micro giây
        $milliseconds = round($microtime * 1000).".png";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo $_FILES["anh"]["tmp_name"];
            if (isset($_FILES["anh"]) && $_FILES["anh"]["error"] == UPLOAD_ERR_OK) {
             $target_file =  dirname(dirname(__DIR__))."\\public\\anhHang\\".$milliseconds;

        // Di chuyển ảnh tải lên vào thư mục đích
        if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
            $hangNew= $this->hanghoaModel->updateHangHoa($_POST['idhangHoa'],$_POST['tenHang'], $_POST['gia'], "../../../public/anhHang/".$milliseconds, $_POST['mau']);
            if ($hangNew) {
                header('Location: /admin/hangHoa');
                exit();
            } else {
                echo 'Sửa hàng thất bại.';
            }
        } else {
            echo "Có lỗi khi tải ảnh lên.";
        }
    } else {
        $hangNew= $this->hanghoaModel->updateHangHoaKhongAnh($_POST['idhangHoa'],$_POST['tenHang'], $_POST['gia'], $_POST['mau']);
            if ($hangNew) {
                header('Location: /admin/hangHoa');
                exit();
            } else {
                echo 'Thêm hàng thất bại.';
            }
    }
    }
    }
}    
?>