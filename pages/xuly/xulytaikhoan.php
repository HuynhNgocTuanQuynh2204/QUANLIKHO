<?php
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id_user = '$id' LIMIT 1";
$query = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_array($query)) {
    unlink('images/avatar/' . $row['avatar']);
}
$sql = "DELETE FROM user WHERE id_user = '$id'";
mysqli_query($mysqli, $sql);
echo "<script>
        alert('Xóa tài khoản thành công');
        window.location.href = 'index.php?quanly=danhsachtaikhoan';
      </script>";

?>