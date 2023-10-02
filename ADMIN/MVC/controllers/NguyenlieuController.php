<?php
require_once("MVC/Models/nguyenlieu.php");
class NguyenlieuController
{
	var $nguyenlieu_model;
	function __construct()
	{
		$this->nguyenlieu_model = new nguyenlieu();
	}

	public function list()
	{
		$data = array();
		$data = $this->nguyenlieu_model->All_NL(); 
		require_once("MVC/Views/Admin/index.php");
	}

	public function add()
	{
		$data = $this->nguyenlieu_model->loainguyenlieu();
		require_once("MVC/Views/Admin/index.php");
	}
	public function store()
	{
		$target_dir = "../public/img/nguyenlieu/";  // thư mục chứa file upload

        $Hinhanh_NL = "";
        $target_file = $target_dir . basename($_FILES["Hinhanh_NL"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["Hinhanh_NL"]["tmp_name"], $target_file);

        if ($status_upload) { // nếu upload file không có lỗi 
            $Hinhanh_NL =  basename($_FILES["Hinhanh_NL"]["name"]);
		}

		$data = array(
			'TenNL' => $_POST['TenNL'],
			'GiaNL' => $_POST['GiaNL'],
			'Hinhanh_NL' => $Hinhanh_NL,
			'MaLoaiNL' => $_POST['MaLoaiNL']
		);
		foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
		}	
		$this->nguyenlieu_model->store($data);
	}
	public function detail()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->nguyenlieu_model->find_NL($id);
		require_once("MVC/Views/Admin/index.php");
	}
	public function delete()
	{
		if (isset($_GET['id'])) {
			$this->nguyenlieu_model->deleteAT($_GET['id']);
			$this->nguyenlieu_model->delete($_GET['id']);
		}
	}
	public function edit()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data_detail = $this->nguyenlieu_model->find_NL($id);

		$data = $this->nguyenlieu_model->loainguyenlieu();

		require_once("MVC/Views/Admin/index.php");
	}
	public function update()
	{
		$target_dir = "../public/img/nguyenlieu/";  // thư mục chứa file upload

        $Hinhanh_NL = "";
        $target_file = $target_dir . basename($_FILES["Hinhanh_NL"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["Hinhanh_NL"]["tmp_name"], $target_file);

        if ($status_upload) { // nếu upload file không có lỗi 
            $Hinhanh_NL =  basename($_FILES["Hinhanh_NL"]["name"]);
		}

		$data = array(
			'MaNL' => $_POST['MaNL'],
			'TenNL' => $_POST['TenNL'],
			'GiaNL' => $_POST['GiaNL'],
			'Hinhanh_NL' => $Hinhanh_NL,
			'MaLoaiNL' => $_POST['MaLoaiNL']
		);

		foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
		}
		if ($Hinhanh_NL == "") {
            unset($data['Hinhanh_NL']);
        }
		$this->nguyenlieu_model->update($data);
	}
}
