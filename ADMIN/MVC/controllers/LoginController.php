<?php 
    require_once("MVC/Models/login.php");
    class LoginController {
        var $login_model;
        public function __construct()
        {
            $this->login_model = new login();
        }
        
        public function admin()
        {
            $data_sp = $this->login_model->tk_sanpham();
            $data_nguoidung = $this->login_model->tk_nguoidung(1);
            $data_dow = $this->login_model->sl_bst();


            $data_hd_no = $this->login_model->tk_hoadon_chuaduyet();
            $data_hd_yes = $this->login_model->tk_hoadon_daduyet();


            $m = date("m");
            $data_countM = $this->login_model->tk_dtthang($m);
            $y = "20".date("y");
            $data_countY = $this->login_model->tk_dtnam($y);

            require_once("MVC/Views/Admin/index.php");
        }
        
    }
?>