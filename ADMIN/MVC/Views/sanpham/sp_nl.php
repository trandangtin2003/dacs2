<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="?mod=sanpham&act=update" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="MaSP" value="<?= $data['MaSP'] ?>">    
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <label><h4><b><?=$data['TenSP']?></b></h4></label>
        </div>
        <div class="form-group">
            <label for="">Đơn giá</label>
            <label><h4><b><?= number_format($data['DonGia']) ?></b><i>VND</i></h4></label>
        </div>
        
        <div class="form-group">
            <hr>
            <strong>Bảng nguyên liệu thành phần trong món ||| <b>   <?php echo $data['TenSP'] ; ?></b></strong>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">Tên nguyên liệu</th>
                <th scope="col">Số lượng nguyên liệu</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data_detail_sp_nl as $row) { ?>
                <tr>
                  <td><?= $row['TenNL'] ?></td>
                 
                  <td><input type="text" class="form-control" name='Sl_SPNL' onblur="setHref_update(<?= $data['MaSP'] ?>, <?= $row['Ma_SPNL'] ?>)" 
                            id="Sl_SPNL_<?= $row['Ma_SPNL'] ?>" value="<?= $row['Sl_SPNL'] ?>"></td>
                  <td>
                    <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
                    <a href="" type="button" class="btn btn-info" id="url_SP_<?= $row['Ma_SPNL'] ?>" 
                        onclick="return confirm('Bạn có thật sự muốn update số lượng nguyên liệu ?');" type="button" class="btn btn-info">udate số lượng nguyên liệu</a>
                    <a href="?mod=sanpham&act=delete_sp_nl&id_sp_nl=<?= $row['Ma_SPNL']?>&id=<?= $row['MaSP']?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
                    <?php }?>
                  </td>
                </tr>
              <?php } ?>
          </table>
          <hr>
          <strong><b>Thêm</b> nguyên liệu vào bảng nguyên liệu thành phần món  ||| <b>   <?php echo $data['TenSP'] ; ?></b></strong>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">Tên nguyên liêụ</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Loại nguyên liệu</th>
                <th scope="col">Số lượng nguyên liêụ</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data_nl as $row) { ?>
                <tr>
                  <td><?= $row['TenNL'] ?></td>
                  <td>
                    <img src="../public/img/nguyenlieu/<?= $row['Hinhanh_NL'] ?>" height="60px">
                  </td>
                  <td><?= $row['TenLoaiNL'] ?></td>
                  <td><input type="text" class="form-control" name='Sl_SPNL' onblur="setHref_add(<?= $data['MaSP'] ?>, <?= $row['MaNL'] ?>)" 
                            id="Sl_SPNL_<?= $row['MaNL'] ?>"></td>
                  <td>
                    <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
                    
                    <a href="" type="button" class="btn btn-info" id="url_SP_<?= $row['MaNL'] ?>" 
                        onclick="return confirm('Bạn có thật sự muốn thêm vào nguyên liệu làm món ăn này ?');" type="button" class="btn btn-info">Thêm vào nguyên liệu món ăn </a>
                    <?php }?>
                  </td>
                </tr>
              <?php } ?>
          </table>
          <script>
            $(document).ready(function() {
              $('#dataTable').DataTable();
            });
          </script>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#summernote1').summernote();
            $('#summernote2').summernote();
        });
        function setHref_add(MaSP, MaNL) {
            var Sl_SPNL = document.getElementById("Sl_SPNL_" + MaNL).value;
            document.getElementById("url_SP_" + MaNL).href = "?mod=sanpham&act=add_sp_nl&id_sp=" + MaSP + "&id_nl=" + MaNL +
                                                    "&Sl_SPNL=" + Sl_SPNL;
        }
        function setHref_update(MaSP, Ma_SPNL) {
            var Sl_SPNL = document.getElementById("Sl_SPNL_" + Ma_SPNL).value;
            document.getElementById("url_SP_" + Ma_SPNL).href = "?mod=sanpham&act=update_sp_nl&MASP=" + MaSP + "&Ma_SPNL=" + Ma_SPNL +
                                                    "&Sl_SPNL=" + Sl_SPNL;
        }
    </script>