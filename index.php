<?php
session_start();
$mod = isset($_GET['mod']) ? $_GET['mod'] : "home";
$act = isset($_GET['act']) ? $_GET['act'] : "list";
switch ($mod) {
    case 'home':
        require_once('Controllers/HomeController.php');
        $controller_obj = new HomeController();
        switch ($act) {
            case 'list':
                $controller_obj->list();
                break;
            case 'list_cn':
                $controller_obj->list_cn();
                break;
            case 'dow_SP':
                $controller_obj->dow_SP();
                break;
            case 'gim_SP':
                $controller_obj->gim_SP();
                break;  
            case 'delete_ND_SP':
                $controller_obj->delete_ND_SP();
                break;
           
            default:
            unset($_SESSION['pick']);
                $controller_obj->list();
                break;
        }
        break;
     case 'gim_note':
        require_once('Controllers/GimNoteController.php');
        $controller_obj = new GimNoteController();
        switch ($act) {
            case 'list':
                $controller_obj->list();
                break;
            case 'view_note':
                $controller_obj->view_note();
                break;
            case 'delete_note':
                $controller_obj->delete_note();
                break;
            case 'note':
                $controller_obj->note();
                break;     
            case 'deleteall':
                $controller_obj->deleteall_note();
                break;  
            case 'tru_sl':
                $controller_obj->tru_sl();
                break;
            case 'cong_sl':
                $controller_obj->cong_sl();
                break;
            default:
                $controller_obj->list();
                break;
        }
        break;    
    case 'detail':
        require_once('Controllers/DetailController.php');
        $controller_obj = new DetailController();
        switch ($act) {
            case 'detail':
                $controller_obj->list();
                break;
            default:
                $controller_obj->list();
                break;
        }
        break;
    case 'nguoidung':
        require_once('Controllers/NguoidungController.php');
        $controller_obj = new NguoidungController();
        switch ($act) {
            case 'store_sp':
                $controller_obj->store_sp();
                break;
            case 'nguoidung_sp_nl':
                $controller_obj->sp_nl();
                break;
            case 'nguoidung_delete_sp_nl':
                $controller_obj->nguoidung_delete_sp_nl();
                break;
            case 'nguoidung_add_sp_nl':
                $controller_obj->nguoidung_add_sp_nl();
                break;
            case 'nguoidung_update_sp_nl':
                $controller_obj->nguoidung_update_sp_nl();
                break; 
            case 'nguoidung_ht_edit_sp':
                $controller_obj->nguoidung_ht_edit_sp();
                break;
        }
        break;
    case 'checkout':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        require_once('Controllers/CheckoutController.php');
        $controller_obj = new CheckoutController();
        switch ($act) {
            case 'list':
                $controller_obj->list();
                break;
            case 'save':
                $controller_obj->save();
                break;
            default:
                $controller_obj->list();
                break;
        }
        break;        
        
    case 'taikhoan':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "taikhoan";
        require_once('Controllers/LoginController.php');
        $controller_obj = new LoginController();
        if ((isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true)) {
            switch ($act) {
                case 'dangxuat':
                    $controller_obj->dangxuat();
                    break;
                case 'update':
                    $controller_obj->update();
                    break;
                default:
                    header('location: ?act=error');
                    break;
            }
            break;
        } else {
            if ((isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) ) {
                switch ($act) {
                    case 'dangxuat':
                        $controller_obj->dangxuat();
                        break;

                    case 'update':
                        $controller_obj->update();
                        break;
                    default:
                        header('location: ?act=error');
                        break;
                }
                break;
            } else {
                switch ($act) {
                    case 'login':
                        $controller_obj->login();
                        break;
                    case 'dangnhap':
                        $controller_obj->login_action();
                        break;
                    case 'dangky':
                        $controller_obj->dangky();
                        break;
                    default:
                        $controller_obj->login();
                        break;
                }
                break;
            }
        }    
    default:
        require_once('Controllers/HomeController.php');
        $controller_obj = new Homecontroller();
        $controller_obj->list();
        break;
}
