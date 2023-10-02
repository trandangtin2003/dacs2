<?php
require_once("model.php");

class LoaiNL extends Model
{
    var $table = "loainguyenlieu";
    var $contens = "MaLoaiNL";
    function deleteAT($id)
    {
        $query = "DELETE from nguyenlieu where MaLoaiNL=$id";
        
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
        }
    }
}
