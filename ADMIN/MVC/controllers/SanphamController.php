<?php
require_once("MVC/Models/sanpham.php");
class SanphamController
{
    var $sanpham_model;
    public function __construct()
    {
        $this->sanpham_model = new sanpham();
    }
    public function list()
    {
        $data = $this->sanpham_model->All_SP();
        require_once("MVC/Views/Admin/index.php");
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->sanpham_model->find_SP($id);
        $data_detail_sp_nl = $this->sanpham_model->find_sp_nl($id);
        require_once("MVC/Views/Admin/index.php");
    }
    public function add()
    {
        $data_dm = $this->sanpham_model->danhmuc();
        require_once("MVC/Views/Admin/index.php");
    }
    public function store()
    {
        $target_dir = "../public/img/products/";  // thư mục chứa file upload

        $HinhAnh1 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh1"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["HinhAnh1"]["tmp_name"], $target_file);

        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh1 =  "img/products/" . basename($_FILES["HinhAnh1"]["name"]);
        }

        $HinhAnh2 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh2"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh2"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh2 =  "/img/products/" . basename($_FILES["HinhAnh2"]["name"]);
        }

        $HinhAnh3 = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh3"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh3"]["tmp_name"], $target_file);
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh3 =  "/img/products/" . basename($_FILES["HinhAnh3"]["name"]);
        }

        $TrangThai = 0;
        if (isset($_POST['TrangThai'])) {
            $TrangThai = $_POST['TrangThai'];
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data = array(
            
            'TenSP'  =>   $_POST['TenSP'],
            'MaDM' => $_POST['MaDM'],
            'MoTa' =>  $_POST['MoTa'],
            'CachLam' =>  $_POST['CachLam'],
            'HinhAnh1' => $HinhAnh1,
            'HinhAnh2' => $HinhAnh2,
            'HinhAnh3' => $HinhAnh3,
            'TrangThai' => $TrangThai,
            'ThoiGian' => $ThoiGian
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->sanpham_model->store($data);
    }
    public function delete()
    {
        $id = $_GET['id'];
        
        $this->sanpham_model->delete_SP($id);
        $this->sanpham_model->delete($id);
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data_dm = $this->sanpham_model->danhmuc();
        $data = $this->sanpham_model->find($id);
        require_once("MVC/Views/Admin/index.php");
    }

    public function sp_nl()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 1;
		$data_dm = $this->sanpham_model->danhmuc();

		$data = $this->sanpham_model->find_SP($id);

		$data_detail_sp_nl = $this->sanpham_model->find_sp_nl($id);
        $data_nl = array();
		$data_nl = $this->sanpham_model->All_NL(); 

		require_once("MVC/Views/Admin/index.php");
	}
	public function delete_sp_nl()
	{
		if (isset($_GET['id_sp_nl']) && isset($_GET['id']) ) {
			$this->sanpham_model->delete_sp_nl($_GET['id_sp_nl'],$_GET['id']);
		}
	}
	public function add_sp_nl()
	{
		if (isset($_GET['id_sp']) && isset($_GET['id_nl']) && isset($_GET['Sl_SPNL']) ) {
			$this->sanpham_model->add_sp_nl($_GET['id_sp'],$_GET['id_nl'],$_GET['Sl_SPNL']);
		}
	}
    public function update_sp_nl()
	{
		if (isset($_GET['Ma_SPNL']) && isset($_GET['Sl_SPNL']) && isset($_GET['MASP']) ) {
			$this->sanpham_model->update_sp_nl($_GET['Ma_SPNL'],$_GET['Sl_SPNL'],$_GET['MASP']);
		}
	}

    public function update()
    {

        $target_dir = "../public/img/products/";  // thư mục chứa file upload

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

        $TrangThai = 0;
        if (isset($_POST['TrangThai'])) {
            $TrangThai = $_POST['TrangThai'];
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
            'TrangThai' => $TrangThai,
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
        $this->sanpham_model->update($data);
    }
}
