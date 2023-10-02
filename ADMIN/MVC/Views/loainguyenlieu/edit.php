<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="?mod=loainguyenlieu&act=update" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Mã loại nguyên liệu</label>
            <input type="text" class="form-control" id="" placeholder="" name="MaLoaiNL" value="<?= $data['MaLoaiNL'] ?>">
        </div>
        <div class="form-group">
            <label for="">Tên nguyên liệu</label>
            <input type="text" class="form-control" id="" placeholder="" name="TenLoaiNL" value="<?= $data['TenLoaiNL'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</table>