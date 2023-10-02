<?php
require_once("model.php");
class Home extends Model
{
    function dow_SP($data)
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
            setcookie('msg', 'Tải xuống thành công', time() + 2);
        } else {
            setcookie('msg', 'Tải không thành công', time() + 2);
        }
        header('Location: ./index.php');
    }
    
    function gim_SP($MaSP_gim,$Time_Gim)
    {
        $query = "INSERT INTO gim(MaSP,MaND,Time_Gim) VALUES ($MaSP_gim,".$_SESSION['login']['MaND'].",$Time_Gim);";
        
        $status = $this->conn->query($query);
       
        if ($status == true) {
            setcookie('msg', 'Gim xuống thành công', time() + 2);
        } else {
            setcookie('msg', 'Gim không thành công', time() + 2);
        }
        header('Location: ./index.php');
    }
    function nguoidung_sanpham_ad()
    {
        $query =   "SELECT * FROM `nguoidung_sanpham` WHERE MaQuyen=1;";

        require("result.php");
        
        return $data;
    }
    function sanpham_danhmuc_cn($a, $b, $danhmuc,$MaQuyen)
    {
        $query =   "SELECT nguoidung_sanpham.*,danhmuc.TenDM, (SELECT(SUM(nguoidung_sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE nguoidung_sanpham.MaSP=nguoidung_sanpham_nguyenlieu.MaSP) AS DonGia FROM nguoidung_sanpham INNER JOIN danhmuc ON nguoidung_sanpham.MaDM=danhmuc.MaDM WHERE nguoidung_sanpham.TrangThai = 1  and nguoidung_sanpham.MaDM = $danhmuc and nguoidung_sanpham.MaND=".$_SESSION['login']['MaND']." and nguoidung_sanpham.MaQuyen=$MaQuyen  ORDER BY nguoidung_sanpham.ThoiGian DESC limit $a,$b";

        require("result.php");
        
        return $data;
    }
     function dongia_cn($min,$max,$MaQuyen)
    {
        
        $query = "SELECT nguoidung_sanpham.*,danhmuc.TenDM, (SELECT(SUM(nguoidung_sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE nguoidung_sanpham.MaSP=nguoidung_sanpham_nguyenlieu.MaSP) AS DonGia FROM nguoidung_sanpham INNER JOIN danhmuc ON nguoidung_sanpham.MaDM=danhmuc.MaDM WHERE nguoidung_sanpham.TrangThai = 1  and nguoidung_sanpham.MaND=".$_SESSION['login']['MaND']." and nguoidung_sanpham.MaQuyen=2 AND (SELECT(SUM(nguoidung_sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE nguoidung_sanpham.MaSP=nguoidung_sanpham_nguyenlieu.MaSP)>=$min AND (SELECT(SUM(nguoidung_sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE nguoidung_sanpham.MaSP=nguoidung_sanpham_nguyenlieu.MaSP)<=$max LIMIT 0, 9";

        require("result.php");
    
        return $data;
    }
    function search_cn($search)
    {
        $search = "'%".$search."%'";
        $query = "SELECT nguoidung_sanpham.*,danhmuc.TenDM, (SELECT(SUM(nguoidung_sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE nguoidung_sanpham.MaSP=nguoidung_sanpham_nguyenlieu.MaSP) AS DonGia FROM nguoidung_sanpham INNER JOIN danhmuc ON nguoidung_sanpham.MaDM=danhmuc.MaDM WHERE nguoidung_sanpham.TrangThai = 1  and nguoidung_sanpham.MaND=".$_SESSION['login']['MaND']." and nguoidung_sanpham.MaQuyen=2 AND nguoidung_sanpham.TenSP LIKE $search;";

        require("result.php");
        
        return $data;
    }
    function All_gim()
    {
        $query = "SELECT sanpham.TenSP,sanpham.HinhAnh1,gim.Time_Gim,(SELECT(SUM(nguoidung_sanpham_nguyenlieu.Sl_SPNL*nguyenlieu.GiaNL)) FROM nguoidung_sanpham_nguyenlieu INNER JOIN nguyenlieu ON nguoidung_sanpham_nguyenlieu.MaNL=nguyenlieu.MaNL WHERE sanpham.MaSP=nguoidung_sanpham_nguyenlieu.MaSP) AS DonGia FROM sanpham INNER JOIN gim ON sanpham.MaSP=gim.MaSP WHERE gim.MaND=".$_SESSION['login']['MaND']." ORDER BY gim.Time_Gim DESC;";

        require("result.php");

        return $data;
        
    }
    function detail_SP($MaSP_dow)
    {
        $query = "SELECT * FROM sanpham WHERE MaSP=$MaSP_dow;";

        require("result.php");

        return $data;
        
    }
    function delete_ND_SP($MaQuyen,$MaSP_dow)
    {
        
        $query1 = "DELETE FROM `nguoidung_sanpham` WHERE MaQuyen=$MaQuyen AND CONCAT(`nguoidung_sanpham`.`MaSP`)=$MaSP_dow AND MaND=".$_SESSION['login']['MaND'].";";
        $query2 = "DELETE FROM `nguoidung_sanpham_nguyenlieu` WHERE MaSP=$MaSP_dow";
        $status1 = $this->conn->query($query1);
        $status2 = $this->conn->query($query2);
        if ($status1 == true && $status2 == true ) {
            setcookie('msg', 'Xóa công thức cá nhân thành công', time() + 2);
        } else {
            setcookie('msg', 'Xóa công thức cá nhân không thành công', time() + 2);
        }
        header("Location: ./index.php?mod=home&act=list_cn&MaQuyen=".$MaQuyen."&pick=".$MaQuyen."");
    }

}

/* Cố gắng kết nối đến MySQL server. Giả sử bạn đang chạy MySQL server mặc đinh (user là 'root' và không có mật khẩu) */
$link = mysqli_connect("localhost", "root", "tin123", "dacs2");
 
// Kiểm tra kết nối
if($link === false){
    die("ERROR: Không thể kết nối. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Chuẩn bị câu lệnh SQL SELECT
    $sql = "SELECT * FROM sanpham WHERE TenSP LIKE ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Liên kết biến đến câu lệnh đã chuẩn bị như là tham số
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Thiết lập các tham số
        $param_term = $_REQUEST["term"] . '%';
        
        // Cố gắng thực thi câu lệnh đã chuẩn bị
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Kiểm tra số lượng row trong kết quả
            if(mysqli_num_rows($result) > 0){
                // Tìm nạp các hàng kết quả dưới dạng mảng kết hợp
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["TenSP"] . "</p>";
                }
            } else{
                echo "<p>Không tìm thấy kết quả nào</p>";
            }
        } else{
            echo "ERROR: Không thể thực thi câu lệnh $sql. " . mysqli_error($link);
        }
    }
     
    // Đóng câu lệnh
    mysqli_stmt_close($stmt);
}
 
// Đóng kết nối
mysqli_close($link);

