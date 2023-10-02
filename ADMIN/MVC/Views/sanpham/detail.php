<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <h2>Mã sản phẩm: <?= $data['MaSP'] ?></h2>
    <h2>Thuộc danh mục: <?= $data['TenDM'] ?></h2>
    <h2>Tên Sản Phẩm: <?= $data['TenSP'] ?></h2>
    <h2>Giá tiền tổng: <?= number_format($data['DonGia']) ?></h2>
    <h2>Mô tả: <?= $data['MoTa'] ?></h2>
    <h2>Cách làm: <?= $data['CachLam'] ?></h2>
    <h2>Trạng thái: <?= $data['TrangThai'] ?></h2>
    <h2>Thời gian được tải lên cơ sở dữ liệu: <?= $data['ThoiGian'] ?></h2>
    <hr>
            <strong>Bảng nguyên liệu thành phần trong món ||| <b>   <?php echo $data['TenSP'] ; ?></b></strong>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">Tên nguyên liệu</th>
                <th scope="col">Số lượng nguyên liệu</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data_detail_sp_nl as $row) { ?>
                <tr>
                  <td><?= $row['TenNL'] ?></td>
                  <td><?= $row['Sl_SPNL'] ?></td> 
                  
                </tr>
              <?php } ?>
          </table>
          <hr>
</table>