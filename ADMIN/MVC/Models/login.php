<?php
require_once("connection.php");
class login
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function tk_sanpham(){
        $query = "SELECT count(MaSP) as Count FROM sanpham";

        return $this->conn->query($query)->fetch_assoc();
    }
   
    function tk_nguoidung($id){
        $query = "SELECT count(MaND) as Count FROM NguoiDung WHERE MaQuyen = $id";
        
        return $this->conn->query($query)->fetch_assoc();
    }
    function sl_bst(){
        $query = "SELECT count(MaSP) as Count FROM nguoidung_sanpham WHERE MaQuyen = 1";
        
        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_hoadon_chuaduyet(){
        $query = "SELECT count(MaHD) as Count FROM HoaDon WHERE TrangThai = 0";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_hoadon_daduyet(){
        $query = "SELECT count(MaHD) as Count FROM HoaDon WHERE TrangThai = 1";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_dtthang($m){
        $query = "SELECT SUM(TongTien) as Count FROM HoaDon WHERE MONTH(NgayLap) = $m And TrangThai = 1";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_dtnam($y){
        $query = "SELECT SUM(TongTien) as Count FROM HoaDon WHERE YEAR(NgayLap) = $y And TrangThai = 1";

        return $this->conn->query($query)->fetch_assoc();
    }
}
