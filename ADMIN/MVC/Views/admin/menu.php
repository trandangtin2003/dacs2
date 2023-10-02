 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
 
  <div class="sidebar-brand-text mx-3">Ambroshia<sup>ADMIN</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Chức năng
</div>

<!-- Nav Item - Pages Collapse Menu -->
<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<li class="nav-item">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Trang chủ</span></a>
</li>
<?php } ?>
<!-- Nav Item - Charts -->
<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<li class="nav-item">
  <a class="nav-link" href="?mod=nguoidung">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý Tài khoản</span></a>
</li>
<?php } ?>
<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="?mod=sanpham">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý Công thức</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?mod=danhmuc">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý danh mục công thức</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="?mod=loainguyenlieu">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý loại nguyên liệu</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="?mod=nguyenlieu">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý nguyên liệu</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="?mod=hoadon">
    <i class="fas fa-fw fa-table"></i>
    <span>Xét duyệt hóa đơn</span></a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->