<!doctype html>
<html class="no-js" lang="vi-vn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ambrosia :
        <?php 
        $act = isset($_GET['act']) ? $_GET['act'] : "home";
        switch ($act) {
            case "home":
                echo "Home";
                break;
            case "list_cn":
                echo "Home";
                break;    
            case "gim_note":
                echo "Gim";
                break;
            case "note":
                echo "Note";
                break;
            case "detail":
                echo "Chi tiết công thức";
                break; 
            case "nguoidung_add_sp":
                echo "Viết công thức cá nhân";
                break;
            case "nguoidung_sp_nl":
                echo "Update nguyên liệu";
                break;    
            case "nguoidung_edit_sp":
                echo "Viết lại công thức";
                break;
            case "checkout":
                echo "Kiểm tra đơn hàng";
                break;
            case "taikhoan":
                echo "Thông tin cá nhân";
                break;        
            default:
                echo "Lỗi";
            } 
        ?>
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="public/img/icon.jpg">

       <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">


    <link rel="apple-touch-icon" href="public/apple-touch-icon.png">
    <!-- Place icon.png in the root directory -->
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <!-- all css here -->
    <!-- style v3.3.6 css -->
    <link rel="stylesheet" href="public/css/style.css">
   
        <!-- modernizr js -->
    <script src="public/js/main.js"></script>

        <!-- Libraries Stylesheet -->
    <link href="public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
    <link href="public/content/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <!-- Template Stylesheet -->
    <link href="public/content/css/style.css" rel="stylesheet">

    <!-- Data table -->
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>





    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="public/css/style.css" rel="stylesheet">

    <!-- content -->
    <!-- Libraries Stylesheet -->
    <link href="public/content/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- font -->
    <link href="public/css/font.css" rel="stylesheet">
    <link href="public/css/gia.css" rel="stylesheet">


    <!-- Template Stylesheet khong can thiet -->

    <link href="public/content/css/style.css" rel="stylesheet">




    
    <link href="public\doc_content\css\bootstrap.min.css" rel="stylesheet">
    <link href="public\doc_content\css\business-casual.css" rel="stylesheet">

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

<!-- Data table -->
  <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>

<body>
    <!-- header section start -->
    <?php
    require_once("header_footer/header.php")
    ?>
    <!-- header section end -->

    <!-- slider-section-start -->
    <?php
    require_once("dieuhuong.php")
    ?>
    <!-- slider section end -->


   

