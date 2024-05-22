<?php

if (isset($_POST['suatk'])) {
    $id_user = $_POST['id_user'];
    $hovaten = $_POST['hovaten'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_tmp = $_FILES['avatar']['tmp_name'];

    $set_clause = "hovaten = '$hovaten', username = '$username'";

    // Mã hóa mật khẩu nếu có thay đổi
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $set_clause .= ", password = '$hashed_password'";
    }

    // Di chuyển hình ảnh đến thư mục nếu có thay đổi
    if (!empty($avatar)) {
        move_uploaded_file($avatar_tmp, "images/avatar/" . $avatar);
        $set_clause .= ", avatar = '$avatar'";
    }

    // Cập nhật tài khoản trong cơ sở dữ liệu
    $sql_sua = "UPDATE user SET $set_clause WHERE id_user = '$id_user'";
    $query_sua = mysqli_query($mysqli, $sql_sua);

    if ($query_sua) {
        echo "<script>
                alert('Cập nhật tài khoản thành công');
                window.location.href = 'index.php?quanly=danhsachtaikhoan';
              </script>";
    } else {
        echo "<script>
                alert('Có lỗi xảy ra khi cập nhật tài khoản');
                window.location.href = 'index.php?quanly=suataikhoan&id=$id_user';
              </script>";
    }
}

// Lấy thông tin tài khoản từ cơ sở dữ liệu
if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $sql_get = "SELECT * FROM user WHERE id_user = '$id_user'";
    $query_get = mysqli_query($mysqli, $sql_get);
    $row = mysqli_fetch_assoc($query_get);
}
?>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-container">
                    <h2 class="text-center mb-4">Sửa Tài Khoản</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                        <div class="mb-3">
                            <label for="hovaten" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="hovaten" name="hovaten" value="<?php echo $row['hovaten']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Tài khoản</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu (để trống nếu không thay đổi)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Hình ảnh (để trống nếu không thay đổi)</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                            <img src="images/avatar/<?php echo $row['avatar'] ?>" width="150px">
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="suatk">Cập nhật tài khoản</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
