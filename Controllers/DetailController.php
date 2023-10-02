<?php
require_once("Models/Detail.php");
class DetailController
{
    var $detail_model;
    public function __construct()
    {
       $this->detail_model = new Detail();
    }
    
    function list()
    {
        $data_danhmuc = $this->detail_model->danhmuc();
        $id = $_GET['id'];
        $table="";
        $data = $this->detail_model->detail_sp($id,$table);
        $content="sanpham_nguyenlieu";
        $data_detail_sp_nl = $this->detail_model->detail_sp_nl($id,$content);
        $data_tt = $this->detail_model->detail_sp_tt($id);
        if($data==NULL && $data_detail_sp_nl ==NULL){
            $id = str_replace($_SESSION['login']['MaND'],"", $id);
            $data = $this->detail_model->detail_sp($id,$table);
            $content="sanpham_nguyenlieu";
            $data_detail_sp_nl = $this->detail_model->detail_sp_nl($id,$content);
            $data_tt = $this->detail_model->detail_sp_tt($id);
        }
         if($data==NULL && $data_detail_sp_nl ==NULL){
            $id = $_GET['id'];
            $table="nguoidung_";
            $data = $this->detail_model->detail_sp($id,$table);
            $content="nguoidung_sanpham_nguyenlieu";
            $data_detail_sp_nl = $this->detail_model->detail_sp_nl($id,$content);
        }

        
        
        if($data_detail_sp_nl==NULL){
            $id = str_replace($_SESSION['login']['MaND'],"", $id);
            $data_detail_sp_nl = $this->detail_model->detail_sp_nl($id);
        }

        if($data!=null){
            $in="";
            $data_lq = $this->detail_model->sanpham_danhmuc(0,4,$data['MaDM'],$in);
        }
        require_once('Views/index.php');
    }
}