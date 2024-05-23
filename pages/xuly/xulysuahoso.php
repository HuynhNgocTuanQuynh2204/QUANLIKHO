<?php
require("carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh');
$now->format('Y-m-d H:i:s');

$tenql = $_POST['tenql'];
$matkhau = $_POST['matkhau'];
$avatar = $_FILES['avatar']['name'];
$avatar_tmp = $_FILES['avatar']['tmp_name'];
$avatar_time = time() . '_' . $avatar;

if (isset($_POST['suahoso'])) {
    // Mã hóa mật khẩu
    $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);

    if ($avatar != '') {
        move_uploaded_file($avatar_tmp, 'images/avatar/' . $avatar_time);
        $sql_update = "UPDATE user SET hovaten='" . $tenql . "',password='" . $hashed_password . "', avatar='" . $avatar_time . "' WHERE id_user='$_GET[id]'";
        $sql = "SELECT * FROM user WHERE id_user = '$_GET[id]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('images/avatar/' . $row['avatar']);
        }
    } else {
        $sql_update = "UPDATE user SET hovaten='" . $tenql . "',password='" . $hashed_password . "' WHERE id_user='$_GET[id]'";
    }
    mysqli_query($mysqli, $sql_update);
    echo '<script type="text/javascript">
            alert("Sửa thông tin thành công");
            window.location.href = "index.php?quanly=hoso";
          </script>';
}
?>
