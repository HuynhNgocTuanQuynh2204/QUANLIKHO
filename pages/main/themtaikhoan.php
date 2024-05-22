<?php

if (isset($_POST['themtk'])) {
    $hovaten = $_POST['hovaten'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_tmp = $_FILES['avatar']['tmp_name'];

    // Mã hóa mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Di chuyển hình ảnh đến thư mục
    move_uploaded_file($avatar_tmp, "images/avatar/" . $avatar);

    // Thêm tài khoản vào cơ sở dữ liệu
    $sql_them = "INSERT INTO user (hovaten, username, password, avatar) VALUES ('$hovaten', '$username', '$hashed_password', '$avatar')";
    $query_them = mysqli_query($mysqli, $sql_them);

    if ($query_them) {
        echo "<script>
                alert('Thêm tài khoản thành công');
                window.location.href = 'index.php?quanly=danhsachtaikhoan';
              </script>";
    } else {
        echo "<script>
                alert('Có lỗi xảy ra khi thêm tài khoản');
                window.location.href = 'index.php?quanly=themtaikhoan';
              </script>";
    }
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
                    <h2 class="text-center mb-4">Thêm Tài Khoản</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="hovaten" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="hovaten" name="hovaten" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Tài khoản</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="themtk">Thêm tài khoản</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
