<?php
require("model.php");
class sanpham extends model
{
    var $table = "sanpham";
    var $contens = "MaSP";
    
    function danhmuc(){
        $query = "select * from danhmuc ";
        require("result.php");
        return $data;
    }
    function All_SP()
    {
        $query = "SELECT sanpham.*,danhmuc.TenDM, (SELECT(SUM(sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE sanpham.MaSP=sanpham_nguyenlieu.MaSP) AS DonGia FROM sanpham INNER JOIN danhmuc ON sanpham.MaDM=danhmuc.MaDM ORDER BY MASP DESC ";

        require("result.php");

        return $data;
        
    }
    function find_SP($id)
    {
        $query = "SELECT sanpham.*,danhmuc.TenDM, (SELECT(SUM(sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE sanpham.MaSP=sanpham_nguyenlieu.MaSP) AS DonGia FROM sanpham INNER JOIN danhmuc ON sanpham.MaDM=danhmuc.MaDM WHERE MaSP=$id ";

       return $this->conn->query($query)->fetch_assoc();
        
    }
    function update_sp_nl($Ma_SPNL,$Sl_SPNL,$MASP)
    {
       $query = "UPDATE sanpham_nguyenlieu SET Sl_SPNL=$Sl_SPNL WHERE Ma_SPNL=$Ma_SPNL";
        
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Update thành công', time() + 2);
        } else {
            setcookie('msg', 'Update không thành công', time() + 2);
        }
        header('Location: ?mod=sanpham&act=sp_nl&id='.$MASP);
    }
    function delete_SP($id)
    {
        $query2 = "DELETE from sanpham_nguyenlieu WHERE MaSP=$id";
        $query3 = "DELETE from nguoidung_sanpham WHERE MaSP LIKE "."'".$id."%'".";";
        
        $status2 = $this->conn->query($query2);
        $status3 = $this->conn->query($query3);
        if ( $status2 == true && $status3 == true) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
        }
        
    }
    function find_sp_nl($id)
    {
        $query = "SELECT sanpham_nguyenlieu.Ma_SPNL,sanpham_nguyenlieu.MaSP, sanpham_nguyenlieu.MaNL, sanpham_nguyenlieu.Sl_SPNL, nguyenlieu.TenNL FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNl=nguyenlieu.MaNL WHERE MaSP =$id";
        require("result.php");

        return $data;
    }
    function delete_sp_nl($id_sp_nl,$id)
    {
        $query = "DELETE from sanpham_nguyenlieu where Ma_SPNL=$id_sp_nl";
        
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
        }
        header('Location: ?mod=sanpham&act=sp_nl&id='.$id);
    }
    function add_sp_nl($id_sp,$id_nl,$Sl_SPNL)
    {
        $query = "INSERT INTO sanpham_nguyenlieu(MaSP,MaNL,Sl_SPNL) VALUES ($id_sp,$id_nl,$Sl_SPNL)";
        
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'thêm thành công', time() + 2);
        } else {
            setcookie('msg', 'thêm không thành công', time() + 2);
        }
        header('Location: ?mod=sanpham&act=sp_nl&id='.$id_sp);
    }
}
