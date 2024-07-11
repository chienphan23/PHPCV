<?php

namespace App\Model;

class HangHoaModel {
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
    public function getAllHangHoa()
    {
        $result = $this->mysqli->query("SELECT * FROM hanghoa");
        return $result->fetch_all(MYSQLI_ASSOC);    // nhiều hàng
    }
    public function getOneHangHoa($idhangHoa)
    {
        $result = $this->mysqli->query("SELECT * FROM hanghoa where idhangHoa = $idhangHoa");
        return $result->fetch_assoc();    
    }
    public function getHangHoaWithKeySearch($tenHang)
    {
        $result = $this->mysqli->query("SELECT * FROM hanghoa where tenHang like '%$tenHang%'");
        return $result->fetch_all(MYSQLI_ASSOC);  
    }
    
    public function LocHangHoaTheoMau($mau)
    {
        $result = $this->mysqli->query("SELECT * FROM hanghoa where mau = '$mau'");
        return $result->fetch_all(MYSQLI_ASSOC);  
    }
    public function createHangHoa($tenHang, $gia, $anh, $mau)
    {
        $result = $this->mysqli->query("INSERT INTO hanghoa (tenHang, gia, anh, mau) VALUES ('$tenHang', '$gia', '$anh', '$mau')");
        return $result;    
    }
    public function updateHangHoa($idhangHoa,$tenHang, $gia, $anh, $mau)
    {
        $result = $this->mysqli->query("UPDATE hanghoa SET tenHang = '$tenHang', gia = '$gia', anh = '$anh', mau = '$mau' WHERE idhangHoa= '$idhangHoa'");
        return $result;    
    }
    
    public function updateHangHoaKhongAnh ($idhangHoa,$tenHang, $gia, $mau)
    {
        $result = $this->mysqli->query("UPDATE hanghoa SET tenHang = '$tenHang', gia = '$gia', mau = '$mau' WHERE idhangHoa= '$idhangHoa'");
        return $result; 
    }
    public function deleteHangHoa($idhangHoa){
        return $this->mysqli->query("DELETE FROM hanghoa WHERE idhangHoa='$idhangHoa'");
    }
}
?>