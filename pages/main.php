<div class="wrapper">
    <style>
    .wrapper {
        display: flex;
    }
    </style>
    <?php
        include("sidebar/sidebar.php")
        ?>

    <?php
            if(isset($_GET['quanly'])){
                $tam = $_GET['quanly'];
            } else {
                $tam = '';
            }
            if($tam =='hoso'){
                include("main/hoso.php");
            }else if($tam =='suahoso'){
                include("main/suahoso.php");
            }else if($tam =='xulysuahoso'){
                include("xuly/xulysuahoso.php");
            }
            else if($tam =='xulydanhmuc'){
                include("xuly/xulydanhmuc.php");
            }
            else if($tam =='xulysanpham'){
                include("xuly/xulysanpham.php");
            }
            else if($tam =='danhmucsanpham'){
                include("main/danhmucsanpham.php");
            }
            else if($tam =='themdanhmuc'){
                include("main/themdanhmuc.php");
            }
            else if($tam =='suadanhmuc'){
                include("main/suadanhmuc.php");
            }
            else if($tam =='timkiemdanhmuc'){
                include("main/timkiemdanhmuc.php");
            }
            else if($tam =='quanlisanpham'){
                include("main/quanlisanpham.php");
            }
            else if($tam =='themsanpham'){
                include("main/themsanpham.php");
            }
            else if($tam =='timkiemsanpham'){
                include("main/timkiemsanpham.php");
            }
            else if($tam =='suasanpham'){
                include("main/suasanpham.php");
            }
            else if($tam =='quanlixuatkho'){
                include("main/quanlixuatkho.php");
            }
            else if($tam =='xuatkho'){
                include("main/xuatkho.php");
            }
            else if($tam =='soluong'){
                include("main/soluong.php");
            }
            else if($tam =='xuatkhosanpham'){
                include("main/xuatkhosanpham.php");
            }
            else if($tam =='giohang'){
                include("main/giohang.php");
            }
            else if($tam =='vanchuyen'){
                include("main/vanchuyen.php");
            }
            else if($tam =='xuat'){
                include("main/xuat.php");
            }
            else if($tam =='timkiemxuatkho'){
                include("main/timkiemxuatkho.php");
            }
            else if($tam =='1nam'){
                include("main/1nam.php");
            }
            else if($tam =='7ngay'){
                include("main/7ngay.php");
            }
            else {
                include("main/index.php");
            }
          ?>
</div>