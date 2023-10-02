<?php
require_once("Models/checkout.php");
class CheckoutController
{
    var $checkout_model;
    public function __construct()
    {
        $this->checkout_model = new Checkout();
    }
    function list()
    {
        if (isset($_SESSION['login'])) {
            $count = 0;
            if (isset($_SESSION['nguyenlieu'])) {
                foreach ($_SESSION['nguyenlieu'] as $value) {
                    $count += $value['ThanhTien'];
                }
            }
            require_once('Views/index.php');
        } else {
            header('location: ?act=taikhoan');
        }
    }
    function  save()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');

        $count = 0;
        if (isset($_SESSION['nguyenlieu'])) {
            foreach ($_SESSION['nguyenlieu'] as $value) {
                $count += $value['ThanhTien'];
            }
        }
         $data = array(
            'MaND' => $_SESSION['login']['MaND'],
            'NgayLap' => $ThoiGian,
            'NguoiNhan' =>    $_POST['NguoiNhan'],
            'SDT' => $_POST['SDT'],
            'DiaChi' => $_POST['DiaChi'],
            'TongTien' => $count,
            'TrangThai'  =>  '0',
        );
        $this->checkout_model->save($data);
        
    }

}
