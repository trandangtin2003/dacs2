
    <div class="container">
        <div class="row">
            <div class="box">
                <hr> 
                    <h2 class="intro-text text-center">
                        <strong>Viết công thức của bạn</strong>
                    </h2> 
                <hr> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form action="?mod=nguoidung&act=store_sp" method="POST" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="cars">Danh mục: </label>
                        <select id="" name="MaDM" class="form-control">
                            <?php foreach ($data_danhmuc as $row) { ?>
                            <option value="<?= $row['MaDM'] ?>"><?= $row['TenDM'] ?></option>
                            <?php } ?>
                        </select>
                        </div>
                        
                        <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="" placeholder="" name="TenSP">
                        </div>
                        <label for="">Mô tả</label>
                        <div class="form-group">
                        <textarea class="form-control" id="summernote1" placeholder="" name="MoTa"></textarea>
                        </div>
                        <label for="">Cách làm</label>
                        <div class="form-group">
                        <textarea class="form-control" id="summernote2" placeholder="" name="CachLam"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="">Hình ảnh 1 </label>
                        <input type="file" class="form-control" id="" placeholder="" name="HinhAnh1">
                        </div>
                        <div class="form-group">
                        <label for="">Hình ảnh 2</label>
                        <input type="file" class="form-control" id="" placeholder="" name="HinhAnh2">
                        </div>
                        <div class="form-group">
                        <label for="">Hình ảnh 3</label>
                        <input type="file" class="form-control" id="" placeholder="" name="HinhAnh3">
                        </div>
                        <button type="submit" class="btn btn-primary"> Thêm nguyên liệu</button>
                    </form>
                    
                <script>
                    $(document).ready(function() {
                    $('#summernote1').summernote();
                    $('#summernote2').summernote();
                    });
                </script>
                </table>
                <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
                </script>
            </div>
        </div>
    </div>



    
</body>

</html>
