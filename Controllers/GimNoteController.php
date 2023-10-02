<?php
require_once("Models/gimnote.php");
class GimNoteController
{
    var $gim_model;
    public function __construct()
    {
       $this->gim_model = new Gim();
    }
    
    
    public function list()
    {
        $data1 = $this->gim_model->list();
        
        $data2 = $this->gim_model->list_cn();
        
        $data = array_merge($data1, $data2);
        require_once('Views/index.php');
    }
    public function note()
    {
        $data= $this->gim_model->list_nl();
        
        require_once('Views/index.php');
    }
  
     function view_note()
    {
        if(isset($_GET['id_nl']) ){
            $id = $_GET['id_nl'];
            $data= $this->gim_model->detail_nl($id);
            foreach ($data as $value) {
                if (isset($_SESSION['nguyenlieu'][$id])) {
                    $arr = $_SESSION['nguyenlieu'][$id];
                    $arr['SoLuong'] += 1;
                    $arr['ThanhTien'] = $arr['SoLuong'] * $arr['DonGia'];
                    $_SESSION['nguyenlieu'][$id] = $arr;
                } else {
                    $arr['MaNL'] = $value['MaNL'];
                    $arr['TenNL'] = $value['TenNL'];
                    $arr['DonGia'] = $value['DonGia'];
                    $arr['SoLuong'] = 1;
                    $arr['ThanhTien'] =  $arr['SoLuong']*$value['DonGia'];
                    $arr['Hinhanh_NL'] = $value['Hinhanh_NL'];
                    $_SESSION['nguyenlieu'][$id] = $arr;
                }
            }
            setcookie('msg', 'Thêm nguyên liệu vào bảng note thành công', time() + 2);
            header('Location: ?mod=gim_note&act=note');
       } else{
            $id = $_GET['id'];
            $data = $this->gim_model->detail_sp($id);
            if($data==NULL){
                $data = $this->gim_model->detail_cn_sp($id);
            }
            foreach ($data as $value) {
                $id = $value['MaNL'];
        
                $count = 0;
                if (isset($_SESSION['nguyenlieu'][$id])) {
                    $arr = $_SESSION['nguyenlieu'][$id];
                    $arr['SoLuong'] += $value['soluong'];
                    $arr['ThanhTien'] = $arr['SoLuong'] * $arr["DonGia"];
                    $_SESSION['nguyenlieu'][$id] = $arr;
                } else {
                    $arr['MaNL'] = $value['MaNL'];
                    $arr['TenNL'] = $value['TenNL'];
                    $arr['DonGia'] = $value['DonGia'];
                    $arr['SoLuong'] = $value['soluong'];
                    $arr['ThanhTien'] =  $arr['SoLuong']*$value['DonGia'];
                    $arr['Hinhanh_NL'] = $value['Hinhanh_NL'];
                    $_SESSION['nguyenlieu'][$id] = $arr;
                }
            }
            setcookie('msg', 'Thêm nguyên liệu của sản phẩm vào bảng note thành công', time() + 2);    
            header('Location: ?mod=gim_note&act=gim_note');
    
       }
        


        
    }
    function delete_note()
    {
        $id = $_GET['id'];
        $id_gim = $_GET['id_gim'];
        $this->gim_model->delete_note($id, $id_gim);
        
    }
    function deleteall_note()
    {
        unset($_SESSION['nguyenlieu'][$_GET['id']]);
        setcookie('msg', 'Xóa nguyên liệu của bảng note thành công', time() + 2);    
        header('Location: ?mod=gim_note&act=note');
    } 
    function tru_sl()
    {
        $arr = $_SESSION['nguyenlieu'][$_GET['id']];
        if ($arr['SoLuong'] == 1) {
            unset($_SESSION['nguyenlieu'][$_GET['id']]);
        } else {
            $arr = $_SESSION['nguyenlieu'][$_GET['id']];
            $arr['SoLuong'] = $arr['SoLuong'] - 1;
            $arr['ThanhTien'] = $arr['SoLuong'] * $arr["DonGia"];
            $_SESSION['nguyenlieu'][$_GET['id']] = $arr;
        }
        header('Location: ?mod=gim_note&act=note');
    }
    function cong_sl()
    {
        $arr = $_SESSION['nguyenlieu'][$_GET['id']];
        $arr['SoLuong'] = $arr['SoLuong'] + 1;
        $arr['ThanhTien'] = $arr['SoLuong'] * $arr["DonGia"];
        $_SESSION['nguyenlieu'][$_GET['id']] = $arr;
         header('Location: ?mod=gim_note&act=note');
    }
}