<?php
if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
    unset($_SESSION['hovaten']);
    unset($_SESSION['id_user']);
    header('location:dangnhap.php');
}
?>

<body>
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="index.php">Quản lí xuất nhập kho</a>
            </div>
        </div>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth"
                aria-expanded="false" aria-controls="auth">
                <i class="lni lni-layout"></i>
                <span>Danh sách</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="index.php?quanly=danhmucsanpham" class="sidebar-link">Danh mục sản phẩm</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?quanly=quanlisanpham" class="sidebar-link">Quản lí sản phẩm</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?quanly=quanlixuatkho" class="sidebar-link">Quản lí xuất kho</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?quanly=giohang" class="sidebar-link">Danh sách loại hàng cần xuất</a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?quanly=danhsachtaikhoan" class="sidebar-link">Danh sách tài khoản</a>
                </li>
            </ul>
        </li>
        </ul>
        </li>
        <li class="sidebar-item">
            <a href="index.php?quanly=hoso" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span>Hồ sơ</span>
            </a>
        </li>
        <div class="sidebar-footer">
            <a href="index.php?dangxuat=1" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Đăng xuất</span>
            </a>
        </div>
    </aside>
</body>