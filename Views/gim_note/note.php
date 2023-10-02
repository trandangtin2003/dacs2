
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#nl">Nguyên liệu</a>
                    </li>
                    <li>
                        <a href="#od">Order</a>
                    </li>
                </ul>
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="row" id="nl">
            <div class="box">
                <div class="col-xs-12 col-sm-12">
                    <hr> 
                    <h2 class="intro-text text-center">
                        <strong>Bảng nguyên liệu cần mua</strong>
                    </h2> 
                    
                    <hr> 
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_note">
                        Thêm nguyên liệu cần mua
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="add_note">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                <th scope="col"><b><u>Tên</u></b></th>
                                </tr>
                                </thead>
                            
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                            <tbody>
                                <?php foreach ($data as $value) { ?>
                                <tr>
                                <td><b><?= $value['TenNL'] ?></b></td>
                                <td>
                                    <a href="?mod=gim_note&act=view_note&id_nl=<?= $value['MaNL'] ?>" class="tay">+</a>
                                </td>
                                </tr>
                                <?php }?>
                            </tbody>
                            </table>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                    <div class="cart-form-text pay-details table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th scope="col"><b><u>Hình ảnh</u></b></th>
                                <th scope="col"><b><u>Tên</u></b></th>
                                <th scope="col"><b><u>Giá</u></b></th>
                                <th scope="col"><b><u>Số lượng</u></b></th>
                                <th scope="col"><b><u>Tổng</u></b></th>
                                <th scope="col"><b><u>Xóa</u></b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_SESSION['nguyenlieu'])) {
                                foreach ($_SESSION['nguyenlieu'] as $value) { ?>
                                    <tr>
                                    <td><img src="public/img/nguyenlieu/<?= $value['Hinhanh_NL'] ?>"/></td>
                                    <td><b><?= $value['TenNL'] ?></b></td>
                                    <td><b><?= number_format($value['DonGia']) ?> VNĐ</b></td> 
                                    <td><b>
                                        <form action="" method="POST">
                                            <div class="plus-minus">
                                                <a href="?mod=gim_note&act=tru_sl&id=<?=$value['MaNL']?>" class="dec qtybutton" type="button">-</a>
                                                <b class="plus-minus-box"><?= $value['SoLuong'] ?></b>
                                                <a href="?mod=gim_note&act=cong_sl&id=<?=$value['MaNL']?>" class="inc qtybutton" type="button">+</a>
                                            </div>
                                        </form>
                                    </b></td>
                                    <td><b><strong><?= number_format($value['ThanhTien']) ?> VNĐ</strong></b></td> 
                                    <td>
                                        <a href="?mod=gim_note&act=deleteall&id=<?= $value['MaNL'] ?>" class="tay"><i class="fas fa-eraser"></i></a>
                                    </td>
                                    </tr>
                        <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <script>
                    $(document).ready(function() {
                        $('#dataTable').DataTable();
                    });
                    </script>
                    <hr> 
                </div>
            </div>
        </div>
        <?php 
            $count=0;
            foreach ($_SESSION['nguyenlieu'] as $value) {
                $count += $value['ThanhTien'];
            }
        ?>
        <?php if ($count != 0){ ?>
        <div class="row" id="od">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Hướng dẫn
                        <strong>Chi tiết thanh toán</strong>
                    </h2>
                    <hr>
                    <form action="?act=checkout" method="post">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Tổng Giỏ Hàng</th>
                                    
                                    <td><?= number_format($count)?> VNĐ</td>
                                </tr>
                                <tr>
                                    <th>Vận Chuyển</th>
                                    <td>15,000 VNĐ</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="tfoot-padd">Tổng tiền</th>
                                    <td class="tfoot-padd"><?=number_format($count+15000)?> VNĐ</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="submit-text coupon">
                            <button type="submit">Đặt hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php }?>
        

    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="public/doc_content/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/doc_content/js/bootstrap.min.js"></script>

    
</body>

</html>
