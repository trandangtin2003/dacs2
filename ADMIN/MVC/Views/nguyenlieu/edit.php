<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="?mod=nguyenlieu&act=update" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="MaNL" value="<?= $data_detail['MaNL'] ?>">
        <div class="form-group">
            <label for="">Tên nguyên liệu</label>
            <input type="text" class="form-control" id="" placeholder="" name="TenNL" value="<?=$data_detail['TenNL'] ?>">
        </div>
        <div class="form-group">
            <label for="">Giá nguyên liệu</label>
            <input type="text" class="form-control" id="" placeholder="" name="GiaNL" value="<?=$data_detail['GiaNL'] ?>">
        </div>
        <div class="form-group">
            <label for="">Hình ảnh</label>
            <img src="../public/img/nguyenlieu/<?=$data_detail['Hinhanh_NL']?>" height="200px" width="200px">
            <input type="file" class="form-control" id="" placeholder="" name="Hinhanh_NL" >
        </div>
        <div class="form-group">
            <label for="cars">Loại nguyên liệu: </label>
            <select id="" name="MaLoaiNL" class="form-control">
                <?php foreach ($data as $row) { ?>
                    <option <?= ($data_detail['MaLoaiNL'] == $row['MaLoaiNL'] ) ? 'selected' : '' ?> value="<?= $row['MaLoaiNL'] ?>"> <?=$row['TenLoaiNL']?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</table>