<?php
include("../config/config.php");
session_start();

if (isset($_POST['dangnhap'])){
    $email = $_POST['name'];
    $matkhau = $_POST['password'];

    // Truy vấn người dùng theo tên đăng nhập
    $sql_ql = "SELECT * FROM user WHERE username = '".$email."' LIMIT 1";
    $result_ql = mysqli_query($mysqli, $sql_ql);
    $count_ql = mysqli_num_rows($result_ql);

    if ($count_ql > 0){
        $row_dangnhap = mysqli_fetch_array($result_ql);
        $hashed_password = $row_dangnhap['password'];

        // Kiểm tra mật khẩu
        if (password_verify($matkhau, $hashed_password)) {
            $_SESSION['hovaten'] = $row_dangnhap['hovaten'];
            $_SESSION['id_user'] = $row_dangnhap['id_user'];
            echo "<script>
                    alert('Đăng nhập thành công');
                    window.location.href = '../index.php'; 
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Tên đăng nhập hoặc mật khẩu không đúng!');
                    window.location.href = '../dangnhap.php'; 
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Tên đăng nhập hoặc mật khẩu không đúng!');
                window.location.href = '../dangnhap.php'; 
              </script>";
        exit();
    }
}
?>
