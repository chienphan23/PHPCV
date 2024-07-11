<?php

namespace App\Model;

class GioHangModel {
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
    public function getAllGioHang($idkhachHang)
    {
        $result = $this->mysqli->query("SELECT * FROM giohangview where idkhachHang= $idkhachHang");
        return $result->fetch_all(MYSQLI_ASSOC);    // nhiều hàng
    }
    public function createGioHang($idkhachHang, $idhangHoa, $soLuongMua){
        return $this->mysqli->query("INSERT INTO gio (idkhachHang, idhangHoa, soLuongMua) VALUES ('$idkhachHang', '$idhangHoa', '$soLuongMua')");

    }
    public function deleteGioHang($idgioHang){
        return $this->mysqli->query("Delete From gio where idgio = $idgioHang");

    }
    public function updateSoLuong($soLuongMua, $idgio){
        return $this->mysqli->query("UPDATE gio SET soLuongMua = '$soLuongMua' WHERE idgio= '$idgio'");

    }
    public function deleteGio($idgio){
        
        return $this->mysqli->query("DELETE FROM gio WHERE idgio='$idgio'");
    }
   
}
?>