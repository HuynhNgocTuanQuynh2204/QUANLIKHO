<?php
session_start(); // Bắt buộc phải gọi session_start() ở đầu file
include('config.php'); // Kết nối CSDL

// Thêm sản phẩm vào giỏ hàng
if(isset($_POST['xuatkho'])){
    $id = $_GET['id'];
    $soluong = $_POST['soluong']; // Lấy số lượng từ form
    $sql = "SELECT * FROM sanpham WHERE id_sp ='".$id."' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        // Kiểm tra số lượng có sẵn trong cơ sở dữ liệu
        if($soluong > $row['soluong']){
            // Nếu số lượng vượt quá, hãy giới hạn lại số lượng
            $soluong = $row['soluong'];
        }
        
        $new_product = array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong));
        // kiem tra session gio hang ton tai
        if(isset($_SESSION['cart'])){
            $found = false;
            foreach($_SESSION['cart'] as &$cart_item){
                // neu du lieu trung
                if($cart_item['id'] == $id){
                    // Kiểm tra xem có vượt quá số lượng không
                    if(($cart_item['soluong'] + $soluong) > $row['soluong']){
                        $cart_item['soluong'] = $row['soluong'];
                    } else {
                        $cart_item['soluong'] += $soluong;
                    }
                    $found = true;
                }
            }
            if($found == false){
                // lien ket du lieu product voi new_product
                $_SESSION['cart'] = array_merge($_SESSION['cart'], $new_product);
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    echo '<script type="text/javascript">   window.location.href = "index.php?quanly=giohang"; </script>';
}

// Trừ số lượng sản phẩm
if (isset($_GET['tru'])){
    $id = $_GET['tru'];
    foreach($_SESSION['cart'] as &$cart_item ){
        if ($cart_item['id'] != $id){
            $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong']);
        } else {
            $tangsoluong = $cart_item['soluong'] - 1;
            if ($tangsoluong > 0){
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong);
            }
        }
    }
    $_SESSION['cart'] = $product;
    echo '<script type="text/javascript">   window.location.href = "index.php?quanly=giohang"; </script>';
}

// Cộng số lượng sản phẩm
if (isset($_GET['cong'])){
    $id = $_GET['cong'];
    $sql = "SELECT * FROM sanpham WHERE id_sp ='".$id."' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        $soluong_con_lai = $row['soluong']; // Số lượng sản phẩm còn lại trong kho

        // Kiểm tra số lượng sản phẩm đã có trong giỏ hàng
        $so_luong_da_co_trong_gio_hang = 0;
        foreach($_SESSION['cart'] as $cart_item){
            if ($cart_item['id'] == $id){
                $so_luong_da_co_trong_gio_hang = $cart_item['soluong'];
                break;
            }
        }

        // Kiểm tra nếu số lượng trong giỏ hàng cộng với 1 vượt quá số lượng còn lại
        if (($so_luong_da_co_trong_gio_hang + 1) <= $soluong_con_lai){
            foreach($_SESSION['cart'] as &$cart_item){
                if ($cart_item['id'] != $id){
                    $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong']);
                }else{
                    $tangsoluong = $cart_item['soluong']+1;
                    $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong);
                }
            }
            $_SESSION['cart'] = $product;
        }
    }
    echo '<script type="text/javascript">   window.location.href = "index.php?quanly=giohang"; </script>';
}

// Xóa sản phẩm
if (isset($_SESSION['cart']) && isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item){
        if ($cart_item['id'] != $id){
            $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong']);
        }
    }
    $_SESSION['cart'] = $product;
    echo '<script type="text/javascript">   window.location.href = "index.php?quanly=giohang"; </script>';
}

// Xóa tất cả
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1){
    unset($_SESSION['cart']);
    echo '<script type="text/javascript">   window.location.href = "index.php?quanly=giohang"; </script>';
}
?>
