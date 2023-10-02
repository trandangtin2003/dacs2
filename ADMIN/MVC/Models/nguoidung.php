<?php
require_once("model.php");
class nguoidung extends Model
{
    var $table = "nguoidung";
    var $contens = "MaND";
    function deleteAT($id)
    {
        $query1 = "DELETE from nguoidung_sanpham where MaND=$id";
        $query2 = "DELETE from hoadon where MaND=42";
        $query3 = "DELETE from gim where MaND=$id";
        
        $status1 = $this->conn->query($query1);
        $status2 = $this->conn->query($query2);
        $status3 = $this->conn->query($query3);
        if ($status2 == true) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công AT', time() + 2);
        }
    }
}