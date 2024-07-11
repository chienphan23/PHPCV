<?php
namespace App\Model;
class HoaDonModel {
    private $mysqli;
    public function __construct()
    {
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $database = DB_NAME;

        $this->mysqli = new \mysqli($host, $username, $password, $database);

        // Check connection
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }
    public function getAllHoaDon($idkhachHang)
    {
        $result = $this->mysqli->query("SELECT * FROM lichsuview where idkhachHang= '$idkhachHang'");
        return $result->fetch_all(MYSQLI_ASSOC); // lấy tất cả dữ liệu dưới dạng mảng
    }

    public function getAllHoaDonAdminThongKe($nam)
    {
        $myArray = array();
        for ($i = 1; $i <= 12; $i++) {
        $result = $this->mysqli->query("SELECT
        SUM(soLuongMua) AS tongLuongMua
        FROM
            lichsuview
        WHERE
            YEAR(ngayMua) = '$nam'
        AND 
            MONTH(ngayMua) = '$i'");
        
        array_push($myArray, $result->fetch_assoc()['tongLuongMua']);
        }
        

        return $myArray; 
    }
    
    public function getAllHoaDonAdmin($tinhTrang){
        $result = $this->mysqli->query("SELECT * FROM lichsuview where tinhTrang= '$tinhTrang'");
        return $result->fetch_all(MYSQLI_ASSOC); 
    }
    public function createHoaDon($idkhachHang, $ngayMua){
        return $this->mysqli->query("INSERT INTO hoadon (idkhachHang, ngayMua, tinhTrang) VALUES ('$idkhachHang', '$ngayMua', 0)");
    }
    public function createChiTietHoaDon($soLuongMua, $idhangHoa, $idhoaDon){
        return $this->mysqli->query("INSERT INTO chitiethoadon (soLuongMua, tinhTrang,idhangHoa, idhoaDon) VALUES ('$soLuongMua', 0, '$idhangHoa', '$idhoaDon')");
    }
    public function getIDHoaDonLonNhat(){
        return $this->mysqli->query("SELECT MAX(idhoaDon) AS idhoaDonNew FROM hoadon");
    }

    public function deleteGioHang($idgioHang){
        return $this->mysqli->query("Delete From gio where idgio = $idgioHang");

    }
    public function updateHoaDon($idchiTietHoaDon, $tinhTrang){
        $result = $this->mysqli->query("UPDATE chitiethoadon SET tinhTrang = b'$tinhTrang' WHERE idchiTietHoaDon= '$idchiTietHoaDon'");
        return $result; 
    }
    public function xuLyKhiXacNhanHetChiTiet($idhoaDon){
        $soChiTietTrongHoaDon = $this->mysqli->query("SELECT COUNT(*) AS soChiTiet FROM chitiethoadon where idhoaDon = '$idhoaDon'");
        $soChiTietDaXacNhan = $this->mysqli->query("SELECT COUNT(*) AS soChiTiet FROM chitiethoadon where idhoaDon = 12 and tinhTrang = 1");
        if($soChiTietDaXacNhan->fetch_assoc()['soChiTiet'] == $soChiTietTrongHoaDon->fetch_assoc()['soChiTiet']){
           return $result = $this->mysqli->query("UPDATE hoadon SET tinhTrang = b'1' WHERE idhoaDon= '$idhoaDon'");
        }
        return true;
    }
}
?>