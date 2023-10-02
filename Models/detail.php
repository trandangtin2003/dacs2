<?php
require_once("model.php");
class Detail extends Model
{
    function detail_sp($id,$table)
    {
        $query =  "SELECT ".$table."sanpham.*,danhmuc.TenDM, (SELECT(SUM(".$table."sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM ".$table."sanpham_nguyenlieu INNER JOIN nguyenlieu ON ".$table."sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE ".$table."sanpham.MaSP= ".$table."sanpham_nguyenlieu.MaSP) AS DonGia FROM ".$table."sanpham INNER JOIN danhmuc ON ".$table."sanpham.MaDM=danhmuc.MaDM WHERE ".$table."sanpham.MaSP = $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    
    function detail_sp_nl($id,$content)
    {
        $query =  "SELECT $content.Ma_SPNL,$content.MaSP, $content.MaNL, $content.Sl_SPNL, nguyenlieu.TenNL , ($content.Sl_SPNL*nguyenlieu.GiaNL)as Price FROM $content INNER JOIN nguyenlieu ON $content.MaNl=nguyenlieu.MaNL WHERE MaSP =$id ";
        require("result.php");

        return $data;
    }
     function detail_sp_tt($id)
    {
        $query =  "SELECT COUNT(MaSP) as tt  FROM `nguoidung_sanpham`  WHERE  MaSP LIKE "."'".$id."."."%'".";";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
   
}