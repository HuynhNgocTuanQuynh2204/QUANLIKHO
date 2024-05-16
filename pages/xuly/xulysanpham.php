<?php
include('../../config/config.php');
require("carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('Asia/Ho_Chi_Minh');
$now->format('Y-m-d H:i:s');
$tensanpham = $_POST['tensanpham'];
$danhmuc = $_POST['danhmuc'];
$soluong = $_POST['soluong'];
$chuthich = $_POST['chuthich'];

if(isset($_POST['themsanpham'])){
    $sql_them = "INSERT INTO sanpham (tensanpham,soluong,id_dm,chuthich,thoigian) VALUES('".$tensanpham."','".$soluong."','".$danhmuc."','".$chuthich."','".$now."')";
    mysqli_query($mysqli,$sql_them);
    echo '<script type="text/javascript">alert("Thêm sản phẩm thành công"); window.location.href = "index.php?quanly=quanlisanpham"; </script>';
} 
elseif (isset($_POST['suasanpham'])){
    $id = $_GET['id']; 
    $sql_update = "UPDATE sanpham SET tensanpham='".$tensanpham."', soluong='".$soluong."', id_dm='".$danhmuc."', chuthich='".$chuthich."', thoigian='".$now."' WHERE id_sp='".$id."'";
    mysqli_query($mysqli,$sql_update);
    echo '<script type="text/javascript">alert("Sửa sản phẩm thành công"); window.location.href = "index.php?quanly=quanlisanpham"; </script>';
} 
else{
    $id = $_GET['id'];
    $sql_xoa = "DELETE FROM sanpham WHERE id_sp ='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    echo '<script type="text/javascript">alert("Xóa sản phẩm thành công"); window.location.href = "index.php?quanly=quanlisanpham"; </script>';
}
?>
