<?php
require_once("model.php");
class Checkout extends Model
{
  function save($data){
    $f = "";
    $v = "";
    foreach ($data as $key => $value) {
        $f .= $key . ",";
        $v .= "'" . $value . "',";
    }
    $f = trim($f, ",");
    $v = trim($v, ",");
    $query = "INSERT INTO hoadon($f) VALUES ($v);";
    
    $status = $this->conn->query($query);

    $query_mahd = "select MaHD from hoadon ORDER BY NgayLap DESC LIMIT 1";
    $data_mahd = $this->conn->query($query_mahd)->fetch_assoc();

    foreach ($_SESSION['nguyenlieu'] as $value) {
        $MaNL =$value['MaNL'];
        $SoLuong = $value['SoLuong'];
        $DonGia = $value['DonGia'];
        $MaHD = $data_mahd['MaHD'];
        $query_ct = "INSERT INTO chitiethoadon(MaHD,MaNL,SoLuong,DonGia) VALUES ($MaHD,$MaNL,$SoLuong,$DonGia)";

        $status_ct = $this->conn->query($query_ct);
    }
    
    if ($status == true and $status_ct = true) {
        setcookie('msg', 'Đặt hàng thành công', time() + 2);
        header('location: ?act=checkout&xuli=order_complete');
    } else {
        setcookie('msg', 'Đặt hàng không thành công', time() + 2);
        header('location: ?act=checkout');
    }
  }
}