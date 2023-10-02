<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<a href="?mod=sanpham&act=add" type="button" class="btn btn-primary">Thêm mới</a>
<?php } ?>
<?php if (isset($_COOKIE['msg'])) { ?>
  <div class="alert alert-success">
    <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
  </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá thành</th> 
      <th scope="col">Hình ảnh</th> 
      <th scope="col">Danh mục</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thời gian đăng tải</th>
      <th>#</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <th scope="row"><?= $row['MaSP'] ?></th>
        <td><?= $row['TenSP'] ?></td>
        <td><?= number_format($row['DonGia']) ?> VNĐ</td>
        <td><img src="../public/<?=$row['HinhAnh1']?>" height="200px" width="200px"></td>
        <td><?= $row['TenDM'] ?></td>
        <td><?= $row['TrangThai'] ?></td>
        <td><?= $row['ThoiGian'] ?></td>
        <td>
          <a href="?mod=sanpham&act=detail&id=<?= $row['MaSP'] ?>" class="btn btn-success">Xem</a>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=sanpham&act=edit&id=<?= $row['MaSP'] ?>" type="button" class="btn btn-warning">Sửa</a>
          <a href="?mod=sanpham&act=sp_nl&id=<?= $row['MaSP'] ?>" type="button" class="btn btn-info" style="font-size:200">Update nguyên liệu và giá</a>
          <a href="?mod=sanpham&act=delete&id=<?= $row['MaSP'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
          <?php } ?>
        </td> 
        
      </tr>
    <?php } ?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>