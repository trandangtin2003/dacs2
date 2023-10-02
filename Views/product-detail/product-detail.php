
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#mt">Mô tả</a>
                    </li>
                    <li>
                        <a href="#nl">Nguyên liệu</a>
                    </li>
                    <li>
                        <a href="#hd">Hướng dẫn</a>
                    </li>
                </ul>
                
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <?php  if(isset($_SESSION['login'])){ ?>
        <div class="box">
            <div class="row">
                    <div class="col-lg-8">
                        <?php  if(isset($_SESSION['pick']) and $_SESSION['pick']=="2"){ ?>
                            <a href="?mod=home&act=delete_ND_SP&MaQuyen=2&MaSP_dow=<?= $data['MaSP'] ?>" class="dow " ><i class='fas fa-minus'>Xóa của tôi</i></a>
                            <a href="?mod=nguoidung&act=nguoidung_sp_nl&MaQuyen=2&MaSP_dow=<?= $data['MaSP'] ?>" class="dow " ><i class='far fa-plus-square'>Thêm nguyên liệu</i></a>                                                 
                            <a href="?mod=detail&act=nguoidung_edit_sp&id=<?= $data['MaSP'] ?>" type="button" class="dow "><i class='fas fa-sliders-h'>Sửa</i></a>
                        <?php }  elseif (isset($_SESSION['pick']) and $_SESSION['pick']=="1"){ ?>
                            <a href="?mod=home&act=delete_ND_SP&MaQuyen=1&MaSP_dow=<?= $data['MaSP'] ?>" class="dow " ><i class='fas fa-minus'>Xóa sưu tập</i></a>
                            <?php } else { ?>
                            <a href="?mod=home&act=dow_SP&MaSP_dow=<?= $data['MaSP'] ?>" class="dow" ><i class='fas fa-download'>Lưu vào bộ sưu tập</i></a>
                        <?php }  ?>
                    </div> 
                    <div class="col-lg-4">
                        <a href="?mod=home&act=gim_SP&MaSP_gim=<?= $data['MaSP'] ?>" class="dow " ><i class='fas fa-edit'>Gim</i></a>
                    </div>            
            </div>
        </div>
         <?php } ?>   
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="public/<?= $data['HinhAnh2'] ?>" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="public/<?= $data['HinhAnh1'] ?>" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="public/<?= $data['HinhAnh3'] ?>" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name"><?= $data['TenSP'] ?></h1>
                    <?php  if(isset($_SESSION['login'])){ ?>
                    <?php if(isset($_SESSION['pick']) == false || $_SESSION['pick']=="1"){ ?> 
                            <h3><span class="text-body"><i class="fas fa-heart text-primary me-2"><?= $data_tt['tt'] ?></i></span></h3>       
                    <?php } ?>   
                    <?php } ?>
                    <hr class="tagline-divider">
                    <h2>
                        <small>$
                            <strong><?=number_format($data['DonGia'])?> VNĐ</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row" id="mt">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Mô tả
                        <strong>hương vị</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt="">
                    <hr class="visible-xs">
                    
                        <p><?= $data['MoTa'] ?></p>
                    
                </div>
            </div>
        </div>
        <div class="row" id="nl">
            <div class="box">
                <div class="col-lg-12"
                    <hr> 
                    <h2 class="intro-text text-center">
                        <strong>Bảng nguyên liệu thành phần trong món ||| <b>   <?php echo $data['TenSP'] ; ?></b></strong>
                    </h2> 
                    <hr> 
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col"><b><u>Tên nguyên liệu</u></b></th>
                            <th scope="col"><b><u>Số lượng nguyên liệu</u></b></th>
                            <th scope="col"><b><u>Giá tổng nguyên liệu</u></b></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data_detail_sp_nl as $row) { ?>
                            <tr>
                            <td><b><?= $row['TenNL'] ?></b></td>
                            <td><b><?= $row['Sl_SPNL'] ?></b></td> 
                             <td><b><?= number_format($row['Price']) ?> /VND</b></td> 
                            
                            </tr>
                        <?php } ?>
                    </table>
                    <hr> 
                </div>
            </div>
        </div>
        <div class="row" id="hd">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Hướng dẫn
                        <strong>Cách nấu</strong>
                    </h2>
                    <hr>
                   
                        <p><?= $data['CachLam'] ?></p>
                    
                </div>
            </div>
        </div>
        
        

    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="public/doc_content/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/doc_content/js/bootstrap.min.js"></script>

    <!-- footer section start -->
    <?php
    require_once("Views/header_footer/footer.php")
    ?>
    <!-- footer section end -->
    
</body>

</html>
