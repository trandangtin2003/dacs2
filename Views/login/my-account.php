
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#info">Thông tin tài khoản</a>
                    </li>
                    <li>
                        <a href="#pass">Thay đổi mật khẩu</a>
                    </li>
                </ul>
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="row" id="info">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Thông tin
                        <strong> tài khoản</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <div class="single-log-info">
                        <div class="bulling-title">
                            <b>
                                <?php if (isset($_COOKIE['doimk'])) {
                                    echo $_COOKIE['doimk'];
                                } ?>
                            </b>
                            <div class="custom-input">
                                <form action="?mod=taikhoan&act=taikhoan&xuli=update" method="post">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input id="input_login" type="text" name="Ho" placeholder="Họ.." required value="<?= $_SESSION['login']['Ho'] ?>" />
                                        </div>
                                        <div class="col-md-5">
                                            <input id="input_login" type="text" name="Ten" placeholder="Tên.." required value="<?= $_SESSION['login']['Ten'] ?>" />
                                        </div>
										<div class="col-md-2  ">
											<select class="form-control" name="GioiTinh" title="Giới tính">
												<option <?= ($_SESSION['login']['GioiTinh'] == 'Nam') ? 'selected' : '' ?> value="Nam"> Nam</option>
												<option <?= ($_SESSION['login']['GioiTinh'] == 'Nữ') ? 'selected' : '' ?> value="Nữ"> Nữ</option>
												<option <?= ($_SESSION['login']['GioiTinh'] == 'Khác') ? 'selected' : '' ?> value="Khác"> Khác</option>
											</select>
										</div>
										<div class="col-md-4">
											<input id="input_login" type="email" name="Email" placeholder="Địa chỉ Email.." required value="<?= $_SESSION['login']['Email'] ?>" />
										</div>
										<div class="col-md-4">
											<input id="input_login" type="text" name="SĐT" placeholder="Số điện thoại.." required pattern="[0-9]+" minlength="10" value="<?= $_SESSION['login']['SDT'] ?>" />
										</div>
										<div class="col-md-4">
											<input id="input_login" type="text" name="DiaChi" placeholder="Địa chỉ.." required value="<?= $_SESSION['login']['DiaChi'] ?>" />
										</div>
                                    </div>
                                    <div class="submit-text">
                                        <button id="bt_login" type="submit_tt"class="dn"><i>Update</i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="pass">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Thay đổi
                        <strong>mật khẩu</strong>
                    </h2>
                    <hr>
					<b>
						<?php if (isset($_COOKIE['doimk'])) {
							echo $_COOKIE['doimk'];
						} ?>
					</b>
                    <div class="single-log-info">
                        <div class="custom-input">
                            <form action="?mod=taikhoan&act=taikhoan&xuli=update" method="post">
                                <input id="input_login" type="password" placeholder="Mật khẩu hiện tại .. " name="MatKhau" minlength="6" required />
                                <input id="input_login" type="password" placeholder="Mật khẩu mới .. " name="MatKhauMoi" />
                                <input id="input_login" type="password" placeholder="Xác nhận lại mật khẩu .." name="MatKhauXN" />
                                <div class="submit-text text-left">
                                    <button id="bt_login" type="submit_pw" value="submit form"class="dn"><i>Update</i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="public/doc_content/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/doc_content/js/bootstrap.min.js"></script>


    
</body>

</html>
