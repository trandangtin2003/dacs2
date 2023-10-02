<?php
require_once("model.php");
class nguyenlieu extends Model
{
    var $table = "nguyenlieu";
    var $contens = "MaNL";
    function loainguyenlieu(){
        $query = "select * from loainguyenlieu ";
        require("result.php");
        return $data;
    }
    function find_NL($id)
    {
        $query = "SELECT nguyenlieu.MaNL, nguyenlieu.TenNL,nguyenlieu.GiaNL, nguyenlieu.Hinhanh_NL, nguyenlieu.MaLoaiNL, loainguyenlieu.TenLoaiNL FROM nguyenlieu INNER JOIN loainguyenlieu ON nguyenlieu.MaLoaiNL=loainguyenlieu.MaLoaiNL WHERE nguyenlieu.MaNL =$id";
        return $this->conn->query($query)->fetch_assoc();
    }
    function deleteAT($id)
    {
        $query1 = "DELETE from sanpham_nguyenlieu where MaNL=$id";
        $query2 = "DELETE from nguoidung_sanpham_nguyenlieu where MaNL=$id";
        $query3 = "DELETE from chitiethoadon where MaNL=$id";
        
        $status1 = $this->conn->query($query1);
        $status2 = $this->conn->query($query2);
        $status3 = $this->conn->query($query3);
        if ($status1 == true && $status2 == true && $status3 == true) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
        }
    }
}