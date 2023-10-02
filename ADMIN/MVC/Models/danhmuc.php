<?php
require_once("model.php");

class Danhmuc extends Model
{
    var $table = "danhmuc";
    var $contens = "MaDM";
    function deleteAT($id)
    {
        $query1 = "DELETE from nguoidung_sanpham where MaDM=$id";
        $query2 = "DELETE from sanpham where MaDM=$id";
        
        $status1 = $this->conn->query($query1);
        $status2 = $this->conn->query($query2);
        
        if ($status1 == true && $status2 == true ) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
        }
    }
}
