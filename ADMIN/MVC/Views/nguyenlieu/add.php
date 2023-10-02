<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <?php if (isset($_COOKIE['msg'])) { ?>
        <div class="alert alert-warning">
            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
        </div>
    <?php } ?>
    <form action="?mod=nguyenlieu&act=store" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Tên nguyên liệu</label>
            <input type="text" class="form-control" id="" placeholder="" name="TenNL">
        </div>
        <div class="form-group">
            <label for="">Giá nguyên liệu</label>
            <input type="text" class="form-control" id="" placeholder="" name="GiaNL">
        </div>
        <div class="form-group">
            <label for="">Hình ảnh nguyên liệu</label>
            <input type="file" class="form-control" id="" placeholder="" name="Hinhanh_NL">
        </div>
        <div class="form-group">
            <label for="cars">Loại nguyên liệu: </label>
            <select id="" name="MaLoaiNL" class="form-control">
                <?php foreach ($data as $row) { ?>
                    <option value="<?= $row['MaLoaiNL'] ?>"><?= $row['TenLoaiNL'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>