<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case "home":
        require_once("home/home.php");
        break;
    case "list_cn":
        require_once("home/home.php");
        break;
    case "gim_note":
        require_once("gim_note/gim_note.php");
        break;
    case "note":
        require_once("gim_note/note.php");
        break;
    case "detail":
        require_once("product-detail/product-detail.php");
        break;
    case "nguoidung_add_sp":
        require_once("add/nguoidung_add_sp.php");
        break;
    case "nguoidung_sp_nl":
        require_once("add/nguoidung_sp_nl.php");
        break;
    case "nguoidung_edit_sp":
        require_once("add/nguoidung_edit_sp.php");
        break;
    case "checkout":
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        switch ($act) {
            case 'list':
                require_once("order/checkout.php");
                break;
            case 'order_complete':
                require_once("order/order_complete.php");
                break;
            default:
                require_once("order/checkout.php");
                break;
        }
        break;
    case "taikhoan":
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "login";
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
            switch ($act) {
                case 'login':
                    require_once("home/home.php");
                    break;
                case 'account':
                    require_once("login/my-account.php");
                    break;
                default:
                    require_once("home/home.php");
                    break;
            }
        } else {
            if ((isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true)) {
                switch ($act) {
                    case 'login':
                        require_once("home/home.php");
                        break;
                    case 'account':
                        require_once("login/my-account.php");
                        break;
                    default:
                        require_once("home/home.php");
                        break;
                }
            } else {
                switch ($act) {
                    case 'login':
                        require_once("home/home.php");
                        break;
                    default:
                        require_once("home/home.php");
                        break;
                }
            }
            break;
        }
    default:
        require_once("error-404.php");
        break;
}
