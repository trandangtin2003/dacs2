<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <h2>Mã AD: <?=$data['MaND']?></h2>
    <h2>Họ: <?=$data['Ho'] ?></h2>
    <h2>Tên: <?=$data['Ten']?></h2>
    <h2>Email: <?=$data['Email'] ?></h2>
    <h2>Số Điện Thoại: <?=$data['SDT'] ?></h2>
    <h2>Địa Chỉ: <?=$data['DiaChi']?></h2>
    <h2>Giới Tính: <?=$data['GioiTinh'] ?></h2>
    <?php 
        if(isset($data['MaQuyen'])){
            switch($data['MaQuyen']){
                case "1": 
                    $q="Khách hàng";
                    break;
                case "2":
                    $q="Quản trị viên";
                    break;
                default:
                    $q="Err";
            }
        }
    ?>
    <h2>Quyền: <?=$q ?></h2>
    <h2>Trạng Thái: <?=$data['TrangThai'] ?></h2>
</table>