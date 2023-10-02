<?php
require_once("model.php");
class Nguoidung extends Model
{
    var $contens = "MaSP";
    function store_sp($data)
    {
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO nguoidung_sanpham($f) VALUES ($v);";

        $status = $this->conn->query($query);
         if ($status == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 2);
        } else {
            setcookie('msg', 'Thêm vào không thành công', time() + 2);
        }
        header('Location: ./index.php');

    }
    function All_NL()
    {
        $query = "SELECT nguyenlieu.MaNL, nguyenlieu.TenNL, nguyenlieu.GiaNL, nguyenlieu.Hinhanh_NL, loainguyenlieu.TenLoaiNL FROM nguyenlieu INNER JOIN loainguyenlieu ON nguyenlieu.MaLoaiNL=loainguyenlieu.MaLoaiNL;";

        require("result.php");

        return $data;
        
    }
    function find_SP($id)
    {
        $query = "SELECT nguoidung_sanpham.*,danhmuc.TenDM, (SELECT(SUM(nguoidung_sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE nguoidung_sanpham.MaSP=nguoidung_sanpham_nguyenlieu.MaSP) AS DonGia FROM nguoidung_sanpham INNER JOIN danhmuc ON nguoidung_sanpham.MaDM=danhmuc.MaDM WHERE MaSP=$id ";

       return $this->conn->query($query)->fetch_assoc();
        
    }
    function find_sp_nl($id)
    {
        $query = "SELECT nguoidung_sanpham_nguyenlieu.Ma_SPNL,nguoidung_sanpham_nguyenlieu.MaSP, nguoidung_sanpham_nguyenlieu.MaNL, nguoidung_sanpham_nguyenlieu.Sl_SPNL, nguyenlieu.TenNL FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNl=nguyenlieu.MaNL WHERE MaSP =$id";
        require("result.php");

        return $data;
    }
    function nguoidung_add_sp_nl($id_sp,$id_nl,$Sl_SPNL)
    {
        $query = "INSERT INTO nguoidung_sanpham_nguyenlieu(MaSP,MaNL,Sl_SPNL) VALUES ($id_sp,$id_nl,$Sl_SPNL)";
        
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'thêm thành công', time() + 2);
        } else {
            setcookie('msg', 'thêm không thành công', time() + 2);
        }
        header('Location: ?mod=nguoidung&act=nguoidung_sp_nl&MaQuyen=2&MaSP_dow='.$id_sp);
    }
    function nguoidung_delete_sp_nl($id_sp_nl,$id)
    {
        $query = "DELETE from nguoidung_sanpham_nguyenlieu where Ma_SPNL=$id_sp_nl AND MaSP=$id";
        
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Xóa thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
        }
        header('Location: ?mod=nguoidung&act=nguoidung_sp_nl&MaQuyen=2&MaSP_dow='.$id);
    }
    function nguoidung_update_sp_nl($Ma_SPNL,$Sl_SPNL,$MASP)
    {
       $query = "UPDATE nguoidung_sanpham_nguyenlieu SET Sl_SPNL=$Sl_SPNL WHERE Ma_SPNL=$Ma_SPNL";
        
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Update thành công', time() + 2);
        } else {
            setcookie('msg', 'Update không thành công', time() + 2);
        }
        header('Location: ?mod=nguoidung&act=nguoidung_sp_nl&MaQuyen=2&MaSP_dow='.$MASP);
    }
    function nd_update_sp($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");


        $query = "UPDATE nguoidung_sanpham SET  $v   WHERE MaSP = " . $data["MaSP"];

        $result = $this->conn->query($query);
        
        if ($result == true) {
            setcookie('msg', 'Duyệt thành công', time() + 2);
           
        } else {
            setcookie('msg', 'Update vào không thành công', time() + 2);
           
        }header('Location: ./index.php');
    }

   
}