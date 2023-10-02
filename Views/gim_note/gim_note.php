
<div class="container">
    <div class="row">
        <div class="box">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-form-text pay-details table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th> 
                            <th scope="col">Số tiền</th>
                            <th scope="col">Thời gian gim</th>
                            <th scope="col">#</th>
                            

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                            <tr>
                                <td><?= $row['TenSP'] ?></td>
                                <td><a href="?mod=detail&act=detail&id=<?= $row['MaSP'] ?>"><img src="public/<?=$row['HinhAnh1']?>" height="200px" width="200px"></a></td>
                                <td><?= number_format($row['DonGia']) ?> VNĐ</td>
                                <td><?= $row['Time_Gim'] ?></td>
                                <td>
                                    <a href="?mod=gim_note&act=view_note&id=<?= $row['MaSP'] ?>" type="button" class="btn btn-warning">Note</a>
                                    <a href="?mod=gim_note&act=delete_note&id_gim=<?= $row['Ma_Gim'] ?>&id=<?= $row['MaSP'] ?>" type="button" class="btn btn-warning">Xóa</a>
                                </td>   
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                    </div>
                    <script>
                    $(document).ready(function() {
                        $('#dataTable').DataTable();
                    });
                    </script>
                </div>            
            </div>    
        </div>
    </div>
</div>



    
</body>

</html>
