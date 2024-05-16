<?php
include('../../config/config.php');

   $tendanhmuc = $_POST['tendanhmuc'];
   $ghichu = $_POST['ghichu'];

   if(isset($_POST['themdanhmuc'])){
    $sql_them = "INSERT INTO danhmuc (tendanhmuc,ghichu) VALUES('".$tendanhmuc."','".$ghichu."')";
    mysqli_query($mysqli,$sql_them);
    echo '<script type="text/javascript">alert("Thêm danh mục thành công");    window.location.href = "index.php?quanly=danhmucsanpham"; </script>';
   
   
   }elseif (isset($_POST['suadanhmuc'])){
      $sql_update = "UPDATE danhmuc SET tendanhmuc='". $tendanhmuc."',ghichu='".$ghichu."' WHERE id_dm='$_GET[id]'";
      mysqli_query($mysqli,$sql_update);
      echo '<script type="text/javascript">alert("Sửa danh mục thành công");    window.location.href = "index.php?quanly=danhmucsanpham"; </script>';
   
   
   }else{
      $id = $_GET['id'];
      $sql_xoa = "DELETE FROM danhmuc WHERE id_dm ='".$id."'";
      mysqli_query($mysqli,$sql_xoa);
      echo '<script type="text/javascript">alert("Xóa danh mục thành công");    window.location.href = "index.php?quanly=danhmucsanpham"; </script>';
   }
?>