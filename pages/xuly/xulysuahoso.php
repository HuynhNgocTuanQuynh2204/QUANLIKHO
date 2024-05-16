<?php
 require("carbon/autoload.php");
 use Carbon\Carbon;
 use Carbon\CarbonInterval;
 $now = Carbon::now('Asia/Ho_Chi_Minh');
 $now->format('Y-m-d H:i:s');
  $tenql = $_POST['hovaten'];
  $matkhau = $_POST['password'];
  $avatar = $_FILES['avatar']['name'];
  $avatar_tmp = $_FILES['avatar']['tmp_name'];
  $avatar_time = time().'_'.$avatar;
 if(isset($_POST['suahoso'])){
    //sua
    if($avatar !=''){
      move_uploaded_file($avatar_tmp,'images/avatar/'.$avatar_time);       
      $sql_update = "UPDATE user SET hovaten='". $tenql."',password ='". $matkhau."',  avatar='". $avatar_time."' WHERE id_user='$_GET[id]'";
      $sql = "SELECT * FROM user WHERE id_user = '$_GET[id]' LIMIT 1";
      $query = mysqli_query($mysqli,$sql);
      while($row = mysqli_fetch_array($query)){
         unlink('avatar/'.$row['avatar']);
      }
   }else{
      $sql_update = "UPDATE user SET hovaten='". $tenql."',password ='". $matkhau."' WHERE id_user='$_GET[id]'";
   }
   mysqli_query($mysqli,$sql_update);
    echo '<script type="text/javascript">alert("Sửa thông tin thành công");    window.location.href = "index.php?quanly=hoso"; </script>';

 }
?>