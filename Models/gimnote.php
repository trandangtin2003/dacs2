<?php
require_once("model.php");
class Gim extends Model
{
   
    function list()
    {
        $query = "SELECT  sanpham.MaSP,sanpham.TenSP,sanpham.HinhAnh1,gim.Ma_Gim,gim.Time_Gim,(SELECT(SUM(sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE sanpham.MaSP=sanpham_nguyenlieu.MaSP) AS DonGia FROM sanpham INNER JOIN gim ON sanpham.MaSP=gim.MaSP WHERE gim.MaND=".$_SESSION['login']['MaND']." ORDER BY gim.Time_Gim DESC;";

        require("result.php");

        return $data;
        
    }
    function list_cn()
    {
        $query = "SELECT  nguoidung_sanpham.MaSP,nguoidung_sanpham.TenSP,nguoidung_sanpham.HinhAnh1,gim.Ma_Gim,gim.Time_Gim,(SELECT(SUM(nguoidung_sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE nguoidung_sanpham.MaSP=nguoidung_sanpham_nguyenlieu.MaSP) AS DonGia FROM nguoidung_sanpham INNER JOIN gim ON nguoidung_sanpham.MaSP=gim.MaSP WHERE gim.MaND=".$_SESSION['login']['MaND']." ORDER BY gim.Time_Gim DESC;";

        require("result.php");

        return $data;
        
    }
    function list_nl()
    {
        $query = "SELECT * FROM nguyenlieu;";

        require("result.php");

        return $data;
        
    }
    function detail_nl($id)
    {
        $query = "SELECT MaNL,Hinhanh_NL,TenNL,GiaNL as DonGia ,MaLoaiNL FROM nguyenlieu WHERE MaNL=$id;";

        require("result.php");

        return $data;
        
    }
    
    function detail_sp($id)
    {
        $query =  "SELECT sanpham_nguyenlieu.MaSP,nguyenlieu.MaNL, nguyenlieu.TenNL,nguyenlieu.Hinhanh_NL,nguyenlieu.GiaNL as DonGia, sanpham_nguyenlieu.Sl_SPNL AS soluong FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNl=nguyenlieu.MaNL WHERE sanpham_nguyenlieu.MaSP = $id ";
         require("result.php");

        return $data;
    }
    function detail_cn_sp($id)
    {
        $query =  "SELECT nguoidung_sanpham_nguyenlieu.MaSP,nguyenlieu.MaNL, nguyenlieu.TenNL,nguyenlieu.Hinhanh_NL,nguyenlieu.GiaNL as DonGia, nguoidung_sanpham_nguyenlieu.Sl_SPNL AS soluong FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNl=nguyenlieu.MaNL WHERE nguoidung_sanpham_nguyenlieu.MaSP = $id ";
         require("result.php");

        return $data;
    }
    function delete_note($id, $id_gim)
    {
        $query =  "DELETE FROM gim WHERE MaSP=$id AND Ma_Gim=$id_gim AND MaND=".$_SESSION['login']['MaND']."";
        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Xóa gim thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa gim  không thành công', time() + 2);
        }
        header('Location: ?mod=gim_note&act=gim_note');
    }

}
