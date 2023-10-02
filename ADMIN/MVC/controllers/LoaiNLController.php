<?php
require_once("MVC/Models/loainguyenlieu.php");
class LoaiNLController
{
	var $loainguyenlieu_model;
	function __construct()
	{
		$this->loainguyenlieu_model = new LoaiNL();
	}

	public function list()
	{
		$data = array();
		$data = $this->loainguyenlieu_model->All(); 
		require_once("MVC/Views/Admin/index.php");
	}

	public function add()
	{
		require_once("MVC/Views/Admin/index.php");
	}
	public function store()
	{
		$data = array(
			'MaLoaiNL' => $_POST['MaLoaiNL'],
			'TenLoaiNL' => $_POST['TenLoaiNL']
		);
		foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
		$this->loainguyenlieu_model->store($data);
	}
	public function detail()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->loainguyenlieu_model->find($id);
		require_once("MVC/Views/Admin/index.php");
	}
	public function delete()
	{
		if (isset($_GET['id'])) {
			$this->loainguyenlieu_model->deleteAT($_GET['id']);
			$this->loainguyenlieu_model->delete($_GET['id']);
		}
	}
	public function edit()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->loainguyenlieu_model->find($id);
		require_once("MVC/Views/Admin/index.php");
	}
	public function update()
	{
		$data = array(
			'MaLoaiNL' => $_POST['MaLoaiNL'],
			'TenLoaiNL' => $_POST['TenLoaiNL'],
		);
		foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
		$this->loainguyenlieu_model->update($data);
	}
}
