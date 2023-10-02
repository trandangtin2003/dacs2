<!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">Thông báo</div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 100px); padding-left: 90px;">
                        <?php if (isset($_COOKIE['msg'])) { ?>
                                <div class="msg"><?= $_COOKIE['msg'] ?></div>        
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
                <script language="javascript">
                    var d = new Date();
                    document.write("Ngày| " + d.getDate() + " |Tháng| ") + document.write(d.getMonth() + 1) + document.write(" |Năm | " + d.getFullYear()); // ngày: document.write(d.getDate() + "<br/>"); tháng: document.write(d.getMonth() + 1 + "<br/>"); năm: document.write(d.getFullYear() + "<br/>");
                </script>

            </div>
        </div>
       
        
        <div class="row align-items-center py-2 px-lg-5">
            <a class="col-lg-4" href="?php act=home ?>">
                <img class="img-logo" src="public\img\white.jpg" alt="">
            </a>

            
            
            <div class="col-lg-6 text-center text-lg-right">
                <ul class="clearfix right floatright">
                    <li>
                        <a><i class="mdi mdi-account"></i></a>
                        <ul>
                            <?php  if(isset($_SESSION['login'])){ ?>
                            <div class="btn-group">
                                <button type="button" class="btn_user" data-toggle="dropdown">
                                    <i class='fas fa-user-astronaut'></i>
                                    <b><?=$_SESSION['login']['Ho']?> <?=$_SESSION['login']['Ten']?></b>
                                </button>
                                <div class="dropdown-menu">
                                    <a id="dr_user" href="?act=taikhoan&xuli=account">Tài khoản</a>
                                    <a id="dr_user" href="?mod=taikhoan&act=taikhoan&xuli=dangxuat">Đăng xuất</a>
                                    <?php
                                        if(isset($_SESSION['isLogin_Admin'])){ ?>
                                        <li><a id="dr_user" href="./ADMIN/?mod=login">Trang quản lý</a></li>
                                    <?php }}else{ ?>
                                    <li>
                                        <button type="button" class="dn btn-default btn-rounded my-3 waves-effect waves-light" data-toggle="modal" data-target="#modalLoginForm">
                                            <p><b>ĐĂNG NHẬP</b></p>
                                        </button>
                                    </li>
                                </div>
                            </div>                           
                            <?php } ?>
                        </ul>
                    </li>
                </ul>             
            </div>
            <div class="col-lg-2 text-center text-lg-right">
            <?php  if(isset($_SESSION['login'])){ ?>
            <ul id="navmenu">
                <li>
                    <a  href="?mod=gim_note&act=gim_note">
                        <button type="button" class="btn_gim">
                            <i class='fas fa-book'></i>
                        </button>
                    </a>
                </li>
                <li>
                    <a  href="?mod=gim_note&act=note">
                        <button type="button" class="btn_gim">
                            <i class='fas fa-clipboard-list'></i>
                        </button>
                        <?php 
                            $soluong = 0;
                            $thanhtien = 0;
                            if(isset($_SESSION['nguyenlieu'])){
                            foreach ($_SESSION['nguyenlieu'] as $value) {
                                $soluong +=1;
                                $thanhtien +=$value['ThanhTien'];
                            }}
                            if($soluong>0 &&  $thanhtien>0){
                        ?>
                        
                            <p id="tl_note"><?=$soluong?> NL :<i>$<?=number_format($thanhtien)?></i></p>
                        <?php }?>
                    </a>
                </li>
                
                 
            </ul>
            <?php } ?>
            </div>
        </div>
        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!--Modal cascading tabs-->
                    <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <ul class="login nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                            Đăng nhập</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                            Đăng ký</a>
                        </li>
                    </ul>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                            <!--Body-->
                            <section class="pages login-page section-padding">
                                <div class="container">
                                    <div class="row">
                                    
                                        <div class="main-input padding60" id="dangnhap">
                                            <div class="login-text">
                                                <div class="custom-input">                                                      
                                                    <form action="?mod=taikhoan&act=taikhoan&xuli=dangnhap" method="post" id="form1">
                                                        <input id="input_login" type="text" name="taikhoan" placeholder="Tài khoản" />
                                                        <input id="input_login" type="password" name="matkhau" placeholder="Mật khẩu" />
                                                        <a class="forget" href="#">Quên mật khẩu?</a>
                                                        <div class="submit-text">
                                                            <button id="bt_login" class="dn" name="submit" type="submit" form="form1">Đăng nhập</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>                                     
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!--/.Panel 7-->

                        <!--Panel 8-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">

                        <!--Body-->
                            <section class="pages login-page section-padding">
                                <div class="container">
                                    <div class="row">
                                        <div class="main-input padding60 new-customer" id="dangky">                                      
                                            <div class="custom-input">
                                                <form action="?mod=taikhoan&act=taikhoan&xuli=dangky" method="post" id="form2">
                                                    <input id="input_login" type="text" name="Ho" placeholder="Họ.." required />
                                                    <input id="input_login" type="text" name="Ten" placeholder="Tên.." required />
                                                    <input id="input_login" type="text" name="TaiKhoan" placeholder="Tên tài khoản đăng nhập.." required  minlength="6"/>
                                                    <input id="input_login" type="email" name="Email" placeholder="Địa chỉ Email.." required />
                                                    <input id="input_login" type="text" name="SĐT" placeholder="Số điện thoại.." required pattern="[0-9]+" minlength="10" />
                                                    <input id="input_login" type="password" name="MatKhau" placeholder="Mật khẩu" minlength="6" required />
                                                    <input id="input_login" type="password" name="check_password" placeholder="Xác nhận mật khẩu" minlength="6" required />
                                                    <div class="submit-text coupon">
                                                        <button id="bt_login" class="dn" type="submit" form="form2">Đăng ký</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!--/.Panel 8-->
                    </div>

                    </div>
                </div>
            </div>
        </div>    
        
    </div>
    <!-- Topbar End -->
    


    