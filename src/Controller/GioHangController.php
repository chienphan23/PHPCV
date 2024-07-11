<?php
namespace App\Controller;

use App\Model\GioHangModel;
use App\Controller;

class GioHangController extends Controller{
    private $gioHangModel;

    public function __construct()
    {
        $this->gioHangModel = new GioHangModel();
    }
    
    public function index(){
    session_start();
    if(isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser'])){
        $currentUser = $_SESSION['currentUser'];
        $gioHang = $this->gioHangModel->getAllGioHang($currentUser['idkhachHang']);
        $this->render('Client/gioHang/index', ['gioHangAll' => $gioHang]);
    } else{
        header("Location: /index.php");
        exit();
    } 
        
    }
    public function create(){
        session_start();
        $currentUser = "";
    if(isset($_SESSION['currentUser']) && !empty($_SESSION['currentUser'])){
        $currentUser = $_SESSION['currentUser'];
    } else{
        header("Location: /index.php");
        exit();
    }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $idkhachHang = $currentUser['idkhachHang'];
            $idhangHoa = $_POST['idhangHoa'];
            $soLuongMua = $_POST['soLuongMua'];

            $gio = $this->gioHangModel->createGioHang($idkhachHang, $idhangHoa, $soLuongMua);

            if ($gio) {
                header('Location: /gioHang');
                exit();
            } else {
                echo 'item cart creation failed.';
            }
        }
    }
    public function updateSoLuong(){
        $soLuongMua = $_POST['soLuongMua'];
        $idgio = $_POST['idgio'];
        $gio = $this->gioHangModel->updateSoLuong($soLuongMua, $idgio);
        if ($gio == 1) {
            header('Location: /gioHang');
            exit();
        } else {
            echo 'item cart creation failed.';
        }
    }
    public function deleteGio(){
        $idgio = $_POST['idgio'];
        $gio = $this->gioHangModel->deleteGio($idgio);
        if ($gio == 1) {
            header('Location: /gioHang');
            exit();
        } else {
            echo 'item cart creation failed.';
        }
    }
}
?>