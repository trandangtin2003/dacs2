<?php
require_once("connection.php");
class model
{
    var $conn;
    function __construct()
    {
        $conn_obj = new connection();
        $this->conn = $conn_obj->conn;
    }
    function limit($a, $b)
    {
        $query =  "SELECT * from sanpham WHERE TrangThai = 1  ORDER BY ThoiGian DESC limit $a,$b";

        require("result.php");

        return $data;
    }
    function danhmuc()
    {
        $query =  "SELECT * from DanhMuc ";

        require("result.php");
        
        return $data;
    }


    function random($id)
    {
        $query = "SELECT * FROM SanPham WHERE TrangThai = 1 ORDER BY RAND () LIMIT $id";
        require("result.php");
        
        return $data;
    }
    
    function sanpham_danhmuc($a, $b, $danhmuc,$in)
    {
        $query =   "SELECT sanpham.*,danhmuc.TenDM, (SELECT(SUM(sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE sanpham.MaSP=sanpham_nguyenlieu.MaSP) AS DonGia , (SELECT COUNT(nguoidung_sanpham.MaSP)  FROM `nguoidung_sanpham`  WHERE  nguoidung_sanpham.TenSP LIKE sanpham.TenSP)  AS tt FROM sanpham INNER JOIN danhmuc ON sanpham.MaDM=danhmuc.MaDM WHERE sanpham.TrangThai = 1  and sanpham.MaDM = $danhmuc $in ORDER BY tt DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }
    function gia($min,$max)
    {
        $query =   "SELECT * FROM sanpham WHERE DonGia >=7000";

        require("result.php");
        
        return $data;
    }
     function dongia($min,$max,$in)
    {
        
        $query = "SELECT sanpham.*,danhmuc.TenDM, (SELECT(SUM(sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE sanpham.MaSP=sanpham_nguyenlieu.MaSP) AS DonGia , (SELECT COUNT(nguoidung_sanpham.MaSP)  FROM `nguoidung_sanpham`  WHERE  nguoidung_sanpham.TenSP LIKE sanpham.TenSP)  AS tt FROM sanpham INNER JOIN danhmuc ON sanpham.MaDM=danhmuc.MaDM WHERE sanpham.TrangThai = 1   $in AND (SELECT(SUM(sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE sanpham.MaSP=sanpham_nguyenlieu.MaSP) >=$min  AND (SELECT(SUM(sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE sanpham.MaSP=sanpham_nguyenlieu.MaSP) <= $max  LIMIT 0, 9";

        require("result.php");
    
        return $data;
    }
    function search($search,$in)
    {
        $search = "'%".$search."%'";
        $query = "SELECT sanpham.*,danhmuc.TenDM, (SELECT(SUM(sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM sanpham_nguyenlieu INNER JOIN nguyenlieu ON sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE sanpham.MaSP=sanpham_nguyenlieu.MaSP) AS DonGia , (SELECT COUNT(nguoidung_sanpham.MaSP)  FROM `nguoidung_sanpham`  WHERE  nguoidung_sanpham.TenSP LIKE sanpham.TenSP)  AS tt FROM sanpham INNER JOIN danhmuc ON sanpham.MaDM=danhmuc.MaDM WHERE sanpham.TrangThai = 1  $in and  sanpham.TenSP LIKE $search ORDER BY sanpham.ThoiGian DESC  LIMIT 0,9";

        require("result.php");
        
        return $data;
    }

    
    
    
}