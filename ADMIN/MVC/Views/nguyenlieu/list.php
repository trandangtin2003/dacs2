<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<a href="?mod=nguyenlieu&act=add" type="button" class="btn btn-primary">Thêm mới</a>
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
      <th scope="col">Mã nguyên liệu</th>
      <th scope="col">Tên nguyên liêụ</th>
      <th scope="col">Giá nguyên liêụ</th>
      <th scope="col">Hình Ảnh</th>
      <th scope="col">Loại nguyên liệu</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <td><?= $row['MaNL'] ?></td>
        <td><?= $row['TenNL'] ?></td>
        <td><?= $row['GiaNL'] ?> VND/...</td>
        <td>
          <img src="../public/img/nguyenlieu/<?= $row['Hinhanh_NL'] ?>" height="60px">
        </td>
        <td><?= $row['TenLoaiNL'] ?></td>
        <td>
          <a href="?mod=nguyenlieu&act=detail&id=<?= $row['MaNL'] ?>" class="btn btn-success">Xem</a>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=nguyenlieu&act=edit&id=<?= $row['MaNL'] ?>" class="btn btn-warning">Sửa</a>
          <a href="?mod=nguyenlieu&act=delete&id=<?= $row['MaNL'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
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