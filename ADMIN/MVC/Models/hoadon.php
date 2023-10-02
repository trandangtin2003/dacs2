<?php
require_once("model.php");
class Hoadon extends Model
{
    var $table = "hoadon";
    var $contens = "MaHD";
    function trangthai($id){
        $query = "select * from HoaDon where TrangThai = $id  ORDER BY MaHD DESC";

        require("result.php");

        return $data;
    }
    function chitiethoadon($id){
        $query = "select ct.*, nl.TenNL as Ten from chitiethoadon as ct, nguyenlieu as nl where ct.MaNL = nl.MaNL and ct.MaHD = $id ";

        require("result.php");
        
        return $data;
    }
    function deleteAT($id)
    {
        $query1 = "DELETE from chitiethoadon where MaHD=$id";
        
        
        $status1 = $this->conn->query($query1);
        
        if ($status1 == true ) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
        }
    }
}