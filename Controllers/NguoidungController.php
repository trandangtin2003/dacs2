<?php
require_once("Models/nguoidung.php");
class NguoidungController
{
    var $nguoidung_model;
    public function __construct()
    {
       $this->nguoidung_model = new Nguoidung();
    }
    public function store_sp()
    {
        $target_dir = "public/img/products/";  // thư mục chứa file upload

        $HinhAnh1 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh1"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["HinhAnh1"]["tmp_name"], $target_file);

        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh1 =  "img/products/" . basename($_FILES["HinhAnh1"]["name"]);
        }
        else{
             $HinhAnh1="NULL";
        }

        $HinhAnh2 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh2"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh2"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh2 =  "/img/products/" . basename($_FILES["HinhAnh2"]["name"]);
        }else{
             $HinhAnh2="NULL";
        }

        $HinhAnh3 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh3"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh3"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh3 =  "/img/products/" . basename($_FILES["HinhAnh3"]["name"]);
        }else{
             $HinhAnh3="NULL";
        }

        

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data = array(
            'MaND'   => $_SESSION['login']['MaND'],
            'MaQuyen'   => '2',
            'MaDM' => $_POST['MaDM'],
            'TenSP'  =>   $_POST['TenSP'],
            'MoTa' =>  $_POST['MoTa'],
            'CachLam' =>  $_POST['CachLam'],
            'HinhAnh1' => $HinhAnh1,
            'HinhAnh2' => $HinhAnh2,
            'HinhAnh3' => $HinhAnh3,
            'TrangThai' => "1",
            'ThoiGian' => $ThoiGian
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->nguoidung_model->store_sp($data);
    }
    

    public function sp_nl()
	{
		$id = isset($_GET['MaSP_dow']) ? $_GET['MaSP_dow'] : 1;
		$data_dm = $this->nguoidung_model->danhmuc();

		$data = $this->nguoidung_model->find_SP($id);

		$data_detail_sp_nl = $this->nguoidung_model->find_sp_nl($id);
        $data_nl = array();
		$data_nl = $this->nguoidung_model->All_NL(); 

		require_once('Views/index.php');
		//require_once('MVC/views/categories/edit.php');
	}
	public function nguoidung_delete_sp_nl()
	{
		if (isset($_GET['id_sp_nl']) && isset($_GET['id']) ) {
			$this->nguoidung_model->nguoidung_delete_sp_nl($_GET['id_sp_nl'],$_GET['id']);
		}
	}
	public function nguoidung_add_sp_nl()
	{
		if (isset($_GET['id_sp']) && isset($_GET['id_nl']) && isset($_GET['Sl_SPNL']) ) {
			$this->nguoidung_model->nguoidung_add_sp_nl($_GET['id_sp'],$_GET['id_nl'],$_GET['Sl_SPNL']);
		}
	}
    public function nguoidung_update_sp_nl()
	{
		if (isset($_GET['Ma_SPNL']) && isset($_GET['Sl_SPNL']) && isset($_GET['MASP']) ) {
			$this->nguoidung_model->nguoidung_update_sp_nl($_GET['Ma_SPNL'],$_GET['Sl_SPNL'],$_GET['MASP']);
		}
	}
    public function nguoidung_ht_edit_sp()
    {
       $target_dir = "public/img/products/";  // thư mục chứa file upload

        $HinhAnh1 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh1"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh1"]["tmp_name"], $target_file);
        var_dump(basename($_FILES["HinhAnh1"]["name"]));
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh1 = "img/products/" .basename($_FILES["HinhAnh1"]["name"]);
        }

        $HinhAnh2 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh2"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh2"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh2 =  "img/products/" . basename($_FILES["HinhAnh2"]["name"]);
        }

        $HinhAnh3 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh3"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh3"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh3 =  "img/products/" . basename($_FILES["HinhAnh3"]["name"]);
        }

        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data = array(
           'MaSP' => $_POST['MaSP'],
            'MaDM' => $_POST['MaDM'],
            'TenSP'  =>   $_POST['TenSP'],
            
            'MoTa' =>  $_POST['MoTa'],
            'CachLam' =>  $_POST['CachLam'],
            'HinhAnh1' => $HinhAnh1,
            'HinhAnh2' => $HinhAnh2,
            'HinhAnh3' => $HinhAnh3,
            'TrangThai' => "1",
            'ThoiGian' => $ThoiGian
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        if ($HinhAnh1 == "") {
            unset($data['HinhAnh1']);
        }
        if ($HinhAnh2 == "") {
            unset($data['HinhAnh2']);
        }
        if ($HinhAnh3 == "") {
            unset($data['HinhAnh3']);
        }
        $this->nguoidung_model->nd_update_sp($data);
    }

}