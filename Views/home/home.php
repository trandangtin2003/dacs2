
<!-- header section start -->
<?php
require_once("header_home.php")
?>

<!-- header section end -->
<!-- Main News Slider Start -->

<!-- Portfolio Start -->
<div class="container-fluid bg-light py-6 px-5">
    <div class="row gx-5">
        <div class="col-12 text-center">
            <div class="d-inline-block bg-dark-radial text-center pt-4 px-5 mb-5">
                <ul class="ul_ds list-inline mb-0" id="portfolio-flters">
                    <li class="li_ds btn btn-ds btn-outline-primary bg-white p-2 active mx-2 mb-4" data-filter="*">                            
                        <img id="ds" src="public/img/danh_sach/all.jpg">
                        <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                            <p class="text-ds text-uppercase m-0">ALL</p>
                        </div>                                                     
                    </li>

                    <li class="li_ds btn btn-ds btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".morning">                            
                        <img src="public/img/danh_sach/sang.jpg">
                        <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                            <p class="text-ds text-uppercase m-0">MORNING</p>
                        </div>                                                     
                    </li>
                    <li class="li_ds btn btn-ds btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".noon">                            
                        <img id="ds" src="public/img/danh_sach/trua.jpg">
                        <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                            <p class="text-ds text-uppercase m-0">NOON</p>
                        </div>                                                     
                    </li>
                    <li class="li_ds btn btn-ds btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".night">                            
                        <img id="ds" src="public/img/danh_sach/toi.jpg">
                        <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                            <p class="text-ds text-uppercase m-0">NIGHT</p>
                        </div>                                                     
                    </li>
                </ul>
            </div>

            <?php  if(isset($_SESSION['pick']) and $_SESSION['pick']=="2"){ ?>
            <a class="btn btn-primary" href="?act=nguoidung_add_sp"> Viết công thức của tôi</a>                                                
            <?php } ?>
            
        </div>
    </div>

    <div class="row g-5 portfolio-container">
        <?php 
            if($data_sanpham1!=NULL){ 
                for($r=0;$r<1;$r++){
        ?>
        <?php 
            for ($i = $r*4; $i < count($data_sanpham1); $i++) {
                ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item morning">
                        <div class="position-relative portfolio-box">
                            <img class="img-fluid w-100" src="public/<?= $data_sanpham1[$i]['HinhAnh1'] ?>" alt="">
                                <div class="portfolio-title shadow-sm">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <a  href="?mod=detail&act=detail&id=<?= $data_sanpham1[$i]['MaSP'] ?>">
                                                <p class="h4 text-uppercase"><?= $data_sanpham1[$i]['TenSP'] ?></p>
                                        </div>
                                        <div class="col-sm-2">        
                                                <span class="text-body"><i class="fas fa-money-bill-wave text-success me-2"></i><?= number_format($data_sanpham1[$i]['DonGia']) ?> VNĐ</span>
                                            </a>
                                        </div>
                                        <?php  if(isset($_SESSION['login'])){ ?>
                                        <?php if(isset($_SESSION['pick']) == false || $_SESSION['pick']=="1"){ ?>
                                        <div class="col-sm-1">        
                                                <span class="text-body"><i class="fas fa-heart text-primary me-2"><?= number_format($data_sanpham1[$i]['tt']) ?></i></span>
                                            </a>
                                        </div>
                                        <?php } ?>   
                                        <?php } ?>
                                    </div>
                                    <?php  if(isset($_SESSION['login'])){ ?>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <?php  if(isset($_SESSION['pick']) and $_SESSION['pick']=="2"){ ?>
                                                    <a href="?mod=home&act=delete_ND_SP&MaQuyen=2&MaSP_dow=<?= $data_sanpham1[$i]['MaSP'] ?>" class="dow " ><i class='fas fa-minus'>Xóa của tôi</i></a>
                                                    <a href="?mod=nguoidung&act=nguoidung_sp_nl&MaQuyen=2&MaSP_dow=<?= $data_sanpham1[$i]['MaSP'] ?>" class="dow " ><i class='far fa-plus-square'>Thêm nguyên liệu</i></a>                                                 
                                                    <a href="?mod=detail&act=nguoidung_edit_sp&id=<?= $data_sanpham1[$i]['MaSP'] ?>" type="button" class="dow "><i class='fas fa-sliders-h'>Sửa</i></a>
                                                <?php }  elseif (isset($_SESSION['pick']) and $_SESSION['pick']=="1"){ ?>
                                                    <a href="?mod=home&act=delete_ND_SP&MaQuyen=1&MaSP_dow=<?= $data_sanpham1[$i]['MaSP'] ?>" class="dow " ><i class='fas fa-minus'>Xóa sưu tập</i></a>
                                                    <?php } else { ?>
                                                    <a href="?mod=home&act=dow_SP&MaSP_dow=<?= $data_sanpham1[$i]['MaSP'] ?>" class="dow" ><i class='fas fa-download'>Lưu vào bộ sưu tập</i></a>
                                                <?php }  ?>
                                            </div> 
                                            <div class="col-sm-4">
                                                <a href="?mod=home&act=gim_SP&MaSP_gim=<?= $data_sanpham1[$i]['MaSP'] ?>" class="dow " ><i class='fas fa-edit'>Gim</i></a>
                                            </div>      
                                        </div>
                                    <?php } ?>   
                                </div>                              
                            <a class="portfolio-btn" href="public/<?= $data_sanpham1[$i]['HinhAnh1'] ?>"  data-lightbox="portfolio1.<?php echo "$i"; ?>">
                                <i class="fas fa-expand text-white"></i>
                            </a>
                            <a href="public/<?= $data_sanpham1[$i]['HinhAnh1'] ?>"  data-lightbox="portfolio1.<?php echo "$i"; ?>"></a>
                            <a href="public/<?= $data_sanpham1[$i]['HinhAnh2'] ?>"  data-lightbox="portfolio1.<?php echo "$i"; ?>"></a>
                            <a href="public/<?= $data_sanpham1[$i]['HinhAnh3'] ?>"  data-lightbox="portfolio1.<?php echo "$i"; ?>"></a>
                            
                        </div>
                    </div>
        <?php }?>    
        <?php 
            }
        }?>


        <?php 
            if($data_sanpham2!=NULL){ 
                for($r=0;$r<1;$r++){
        ?>
        <?php 
            for ($i = $r*4;$i < count($data_sanpham2); $i++) {
                ?>
                
                    <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item noon" >
                        <div class="position-relative portfolio-box">
                            <img class="img-fluid w-100" src="public/<?= $data_sanpham2[$i]['HinhAnh1'] ?>" alt="">
                            <div class="portfolio-title shadow-sm">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <a  href="?mod=detail&act=detail&id=<?= $data_sanpham2[$i]['MaSP'] ?>">
                                            <p class="h4 text-uppercase"><?= $data_sanpham2[$i]['TenSP'] ?></p>
                                    </div>
                                    <div class="col-sm-2">        
                                            <span class="text-body"><i class="fas fa-money-bill-wave text-success me-2"></i><?= number_format($data_sanpham2[$i]['DonGia']) ?> VNĐ</span>
                                        </a>
                                    </div>
                                    <?php  if(isset($_SESSION['login'])){ ?>
                                    <?php if(isset($_SESSION['pick']) == false || $_SESSION['pick']=="1"){ ?>
                                    <div class="col-sm-1">        
                                            <span class="text-body"><i class="fas fa-heart text-primary me-2"><?= number_format($data_sanpham2[$i]['tt']) ?> </i></span>
                                        </a>
                                    </div>
                                    <?php } ?>   
                                    <?php } ?>
                                </div>
                                <?php  if(isset($_SESSION['login'])){ ?>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <?php  if(isset($_SESSION['pick']) and $_SESSION['pick']=="2"){ ?>
                                                <a href="?mod=home&act=delete_ND_SP&MaQuyen=2&MaSP_dow=<?= $data_sanpham2[$i]['MaSP'] ?>" class="dow " ><i class='fas fa-minus'>Xóa của tôi</i></a>
                                                <a href="?mod=nguoidung&act=nguoidung_sp_nl&MaQuyen=2&MaSP_dow=<?= $data_sanpham2[$i]['MaSP'] ?>" class="dow " ><i class='far fa-plus-square'>Thêm nguyên liệu</i></a>                                                 
                                                <a href="?mod=detail&act=nguoidung_edit_sp&id=<?= $data_sanpham2[$i]['MaSP'] ?>" type="button" class="dow "><i class='fas fa-sliders-h'>Sửa</i></a>
                                            <?php }  elseif (isset($_SESSION['pick']) and $_SESSION['pick']=="1"){ ?>
                                                <a href="?mod=home&act=delete_ND_SP&MaQuyen=1&MaSP_dow=<?= $data_sanpham2[$i]['MaSP'] ?>" class="dow " ><i class='fas fa-minus'>Xóa sưu tập</i></a>
                                                <?php } else { ?>
                                                <a href="?mod=home&act=dow_SP&MaSP_dow=<?= $data_sanpham2[$i]['MaSP'] ?>" class="dow" ><i class='fas fa-download'>Lưu vào bộ sưu tập</i></a>
                                            <?php }  ?>
                                        </div> 
                                        <div class="col-sm-4">
                                            <a href="?mod=home&act=gim_SP&MaSP_gim=<?= $data_sanpham2[$i]['MaSP'] ?>" class="dow " ><i class='fas fa-edit'>Gim</i></a>
                                        </div>      
                                    </div>
                                <?php } ?>   
                            </div>                                    
                            <a class="portfolio-btn" href="public/<?= $data_sanpham2[$i]['HinhAnh1'] ?>" data-lightbox="portfolio2.<?php echo "$i"; ?>">
                                <i class="fas fa-expand text-white"></i>
                            </a>                                
                            <a href="public/<?= $data_sanpham2[$i]['HinhAnh1'] ?>"  data-lightbox="portfolio2.<?php echo "$i"; ?>"></a>
                            <a href="public/<?= $data_sanpham2[$i]['HinhAnh2'] ?>"  data-lightbox="portfolio2.<?php echo "$i"; ?>"></a>
                            <a href="public/<?= $data_sanpham2[$i]['HinhAnh3'] ?>"  data-lightbox="portfolio2.<?php echo "$i"; ?>"></a>
                        </div>
                    </div>
        <?php }?>
        <?php 
            }
        }?>

        <?php 
            if($data_sanpham3!=NULL){ 
                for($r=0;$r<1;$r++){
        ?>
        <?php 
            for ($i = $r*4;$i < count($data_sanpham3); $i++) {
                ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item night" >
                        <div class="position-relative portfolio-box">
                            <img class="img-fluid w-100" src="public/<?= $data_sanpham3[$i]['HinhAnh1'] ?>" alt="">
                            <div class="portfolio-title shadow-sm">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <a  href="?mod=detail&act=detail&id=<?= $data_sanpham3[$i]['MaSP'] ?>">
                                            <p class="h4 text-uppercase"><?= $data_sanpham3[$i]['TenSP'] ?></p>
                                    </div>
                                    <div class="col-sm-2">        
                                            <span class="text-body"><i class="fas fa-money-bill-wave text-success me-2"></i><?= number_format($data_sanpham3[$i]['DonGia']) ?> VNĐ</span>
                                        </a>
                                    </div>
                                    <?php  if(isset($_SESSION['login'])){ ?>
                                    <?php if(isset($_SESSION['pick']) == false || $_SESSION['pick']=="1"){ ?>
                                    <div class="col-sm-1">        
                                            <span class="text-body"><i class="fas fa-heart text-primary me-2"><?= number_format($data_sanpham3[$i]['tt']) ?></i> </span>
                                        </a>
                                    </div>
                                    <?php } ?>   
                                    <?php } ?>
                                </div>
                                <?php  if(isset($_SESSION['login'])){ ?>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <?php  if(isset($_SESSION['pick']) and $_SESSION['pick']=="2"){ ?>
                                                <a href="?mod=home&act=delete_ND_SP&MaQuyen=2&MaSP_dow=<?= $data_sanpham3[$i]['MaSP'] ?>" class="dow " ><i class='fas fa-minus'>Xóa của tôi</i></a>
                                                <a href="?mod=nguoidung&act=nguoidung_sp_nl&MaQuyen=2&MaSP_dow=<?= $data_sanpham3[$i]['MaSP'] ?>" class="dow " ><i class='far fa-plus-square'>Thêm nguyên liệu</i></a>                                                 
                                                <a href="?mod=detail&act=nguoidung_edit_sp&id=<?= $data_sanpham3[$i]['MaSP'] ?>" type="button" class="dow "><i class='fas fa-sliders-h'>Sửa</i></a>
                                            <?php }  elseif (isset($_SESSION['pick']) and $_SESSION['pick']=="1"){ ?>
                                                <a href="?mod=home&act=delete_ND_SP&MaQuyen=1&MaSP_dow=<?= $data_sanpham3[$i]['MaSP'] ?>" class="dow " ><i class='fas fa-minus'>Xóa sưu tập</i></a>
                                                <?php } else { ?>
                                                <a href="?mod=home&act=dow_SP&MaSP_dow=<?= $data_sanpham3[$i]['MaSP'] ?>" class="dow" ><i class='fas fa-download'>Lưu vào bộ sưu tập</i></a>
                                            <?php }  ?>
                                        </div> 
                                        <div class="col-sm-4">
                                            <a href="?mod=home&act=gim_SP&MaSP_gim=<?= $data_sanpham3[$i]['MaSP'] ?>" class="dow " ><i class='fas fa-edit'>Gim</i></a>
                                        </div>      
                                    </div>
                                <?php } ?>   
                            </div>      
                            <a class="portfolio-btn" href="public/<?= $data_sanpham3[$i]['HinhAnh1'] ?>" data-lightbox="portfolio3.<?php echo "$i"; ?>">
                                <i class="fas fa-expand text-white"></i>
                            </a>
                            
                            <a href="public/<?= $data_sanpham3[$i]['HinhAnh1'] ?>"  data-lightbox="portfolio3.<?php echo "$i"; ?>"></a>
                            <a href="public/<?= $data_sanpham3[$i]['HinhAnh2'] ?>"  data-lightbox="portfolio3.<?php echo "$i"; ?>"></a>
                            <a href="public/<?= $data_sanpham3[$i]['HinhAnh3'] ?>"  data-lightbox="portfolio3.<?php echo "$i"; ?>"></a>
                        </div>
                    </div>
        <?php }?>
        <?php 
            }
        }?>
        
    </div>
</div>
    <!-- Portfolio End -->
<!-- footer section start -->
<?php
require_once("Views/header_footer/footer.php")
?>
<!-- footer section end -->