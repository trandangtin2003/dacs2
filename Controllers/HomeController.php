<?php
require_once("Models/home.php");
class HomeController
{
    var $home_model;
    public function __construct()
    {
       $this->home_model = new Home();
    }
    
    function list()
    {
        unset($_SESSION['pick']);
        $data_danhmuc = $this->home_model->danhmuc();
        $in="";
        $data_sanpham1 = $this->home_model->sanpham_danhmuc(0,8,1,$in);
        $data_sanpham2 = $this->home_model->sanpham_danhmuc(0,8,2,$in);
        $data_sanpham3 = $this->home_model->sanpham_danhmuc(0,8,3,$in);

        if (isset($_POST['price_min']) and isset($_POST['price_max'])) {
            $data_sanpham1 = [];
            $data_sanpham2 = [];
            $data_sanpham3 = [];
            $min = $_POST['price_min'] ? $_POST['price_min'] : 0;
            $max = $_POST['price_max'] ? $_POST['price_max'] : 1000000;
            $data_search = $this->home_model->dongia($min, $max,$in);
            if ($data_search && count($data_search) > 0) {
                foreach($data_search as $data) {
                   if ($data["MaDM"] == 1) {
                        array_push($data_sanpham1, $data);
                    } else if ($data["MaDM"] == 2){
                        array_push($data_sanpham2, $data);
                    } else {
                        array_push($data_sanpham3, $data);
                    }
                }
            }
        }
        
        if (isset($_POST['search'])) {
            $data_sanpham1 = [];
            $data_sanpham2 = [];
            $data_sanpham3 = [];
            $search = $_POST['search'] ;
            
            $data_search = $this->home_model->search($search,$in);
            if ($data_search && count($data_search) > 0) {
                foreach($data_search as $data) {
                   if ($data["MaDM"] == 1) {
                        array_push($data_sanpham1, $data);
                    } else if ($data["MaDM"] == 2){
                        array_push($data_sanpham2, $data);
                    } else {
                        array_push($data_sanpham3, $data);
                    }
                }
            }
        }
        require_once('Views/index.php');
    }
    function list_cn()
    {
        unset($_SESSION['pick']);
        $pick = $_GET['pick'];
        $_SESSION['pick']=$pick;
        $data_sanpham1 = [];
        $data_sanpham2 = [];
        $data_sanpham3 = [];
        $MaQuyen = $_GET['MaQuyen'];
        $id_in=0;
        if($MaQuyen =="1"){
            $data_nd_sp_ad =$this->home_model->nguoidung_sanpham_ad();  
            if ($data_nd_sp_ad && count($data_nd_sp_ad) > 0) {
                foreach($data_nd_sp_ad as $value) {
                    $id = str_replace($_SESSION['login']['MaND'],"", $value["MaSP"]);
                    $id_in.=",".$id;
                }
            }
           
        }
        $in = "AND sanpham.MaSP IN(".$id_in.")";

         if($MaQuyen =="1"){
            $data_sanpham1 = $this->home_model->sanpham_danhmuc(0,8,1,$in);
            $data_sanpham2 = $this->home_model->sanpham_danhmuc(0,8,2,$in);
            $data_sanpham3 = $this->home_model->sanpham_danhmuc(0,8,3,$in);
         }
         else{
        
            $data_sanpham1 = $this->home_model->sanpham_danhmuc_cn(0,8,1,$MaQuyen);
            $data_sanpham2 = $this->home_model->sanpham_danhmuc_cn(0,8,2,$MaQuyen);
            $data_sanpham3 = $this->home_model->sanpham_danhmuc_cn(0,8,3,$MaQuyen);
         }

        if (isset($_POST['price_min_cn']) and isset($_POST['price_max_cn'])) {
            $data_sanpham1 = [];
            $data_sanpham2 = [];
            $data_sanpham3 = [];
            $min = $_POST['price_min_cn'] ? $_POST['price_min_cn'] : 0;
            $max = $_POST['price_max_cn'] ? $_POST['price_max_cn'] : 1000000;
            if($MaQuyen =="1"){
                $data_search = $this->home_model->dongia($min, $max,$in);
            }
            else{
                $data_search = $this->home_model->dongia_cn($min, $max);
            }
            
            if ($data_search && count($data_search) > 0) {
                foreach($data_search as $data) {
                   if ($data["MaDM"] == 1) {
                        array_push($data_sanpham1, $data);
                    } else if ($data["MaDM"] == 2){
                        array_push($data_sanpham2, $data);
                    } else {
                        array_push($data_sanpham3, $data);
                    }
                }
            }
        }
        
        if (isset($_POST['search_cn'])) {
            $data_sanpham1 = [];
            $data_sanpham2 = [];
            $data_sanpham3 = [];
            $search = $_POST['search_cn'] ;
            if($MaQuyen =="1"){
                $data_search = $this->home_model->search($search,$in);
            }
            else{
               $data_search = $this->home_model->search_cn($search);
            }
            if ($data_search && count($data_search) > 0) {
                foreach($data_search as $data) {
                   if ($data["MaDM"] == 1) {
                        array_push($data_sanpham1, $data);
                    } else if ($data["MaDM"] == 2){
                        array_push($data_sanpham2, $data);
                    } else {
                        array_push($data_sanpham3, $data);
                    }
                }
            }
        }
      require_once('Views/index.php');
    }
    public function dow_SP()
    {
        if(isset($_GET['MaSP_dow']) ){
            $MaSP_dow = $_GET['MaSP_dow'];
            $data_detail_sp=$this->home_model->detail_SP($MaSP_dow);
            foreach($data_detail_sp as $value) {
                $data = array(
                    'MaSP'   => $value['MaSP'].".".$_SESSION['login']['MaND'],
                    'MaND'   => $_SESSION['login']['MaND'],
                    'MaQuyen'   => '1',
                    'MaDM' => $value['MaDM'],
                    'TenSP'  =>   $value['TenSP'],
                    'MoTa' =>  $value['MoTa'],
                    'CachLam' =>  $value['CachLam'],
                    'HinhAnh1' => $value['HinhAnh1'],
                    'HinhAnh2' => $value['HinhAnh2'],
                    'HinhAnh3' => $value['HinhAnh3'],
                    'TrangThai' => $value['TrangThai'],
                    'ThoiGian' => $value['ThoiGian']
                );
            }
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }

            $this->home_model->dow_SP($data);
            }
    }
    public function gim_SP()
    {
        if(isset($_GET['MaSP_gim']) ){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $Time_Gim = str_replace("-","",date('Y-m-d H:i:s'));
            $Time_Gim = str_replace(":","",$Time_Gim);
            $Time_Gim = str_replace(" ","",$Time_Gim);
            $MaSP_gim = $_GET['MaSP_gim'];
            $this->home_model->gim_SP($MaSP_gim,$Time_Gim);
        }
    }
    
    public function gim_note()
    {
        $data = $this->home_model->All_gim();
        require_once('Views/index.php');
    }
    public function delete_ND_SP()
    {
        if(isset($_GET['MaQuyen']) and isset($_GET['MaSP_dow']) ){
            $MaSP_dow=$_GET['MaSP_dow'];
            $MaQuyen=$_GET['MaQuyen'];
            if($MaQuyen ==1){
                $MaSP_dow = $_GET['MaSP_dow'].".".$_SESSION['login']['MaND'];
            }
            $this->home_model->delete_ND_SP($MaQuyen,$MaSP_dow);
        }
    }
}