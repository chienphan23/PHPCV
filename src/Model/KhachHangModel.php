<?php
namespace App\Model;
class KhachHangModel {
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
    public function getOneKhachHang($taiKhoan, $matKhau)
    {
        $result = $this->mysqli->query("SELECT * FROM khachhang where taiKhoan= '$taiKhoan' and matKhau='$matKhau'");
        return $result->fetch_assoc();    // trả về 1 mảng kết hợp
    }
    public function getOneKhachHangByUserName($taiKhoan)
    {
        $result = $this->mysqli->query("SELECT * FROM khachhang where taiKhoan= '$taiKhoan'");
        return $result->fetch_assoc();    
    }
    public function createKhachHang($hoTen, $taiKhoan, $matKhau, $email, $SDT, $diaChi){
        $hashedPassword = password_hash($matKhau, PASSWORD_DEFAULT);

        $result = $this->mysqli->query("INSERT INTO khachhang (hoTen, taiKhoan, matKhau, email, SDT, diaChi)
        VALUES ('$hoTen', '$taiKhoan', '$hashedPassword', '$email', '$SDT', '$diaChi')");
        return $result;
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
}
?>