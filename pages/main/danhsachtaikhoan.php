<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <title>Quản lý tài khoản</title>
</head>
<body>
    <div class="main p-3">
        <div class="text-center">
            <div class="container" style="padding: 10px;">
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-6">
                        <form class="form-inline" action="index.php?quanly=timkiemtaikhoan" method="POST">
                            <div class="input-group w-100">
                                <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên chủ tài khoản" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="btn-group">
                <a href="index.php?quanly=themtaikhoan" class="btn btn-primary">Thêm tài khoản mới</a>
            </div>
            <div class="header_fixed">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hình ảnh</th>
                            <th>Tên chủ tài khoản</th>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM user ORDER BY id_user DESC";
                            $qr = mysqli_query($mysqli, $sql);
                            $i = 0;
                            while ($row = mysqli_fetch_array($qr)) {
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><img src="images/avatar/<?php echo $row['avatar'] ?>" width="150px"></td>
                            <td><?php echo $row['hovaten'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><a href="index.php?quanly=suataikhoan&id=<?php echo $row['id_user'] ?>" class="sua">Sửa</a></td>
                            <td><a href="index.php?quanly=xulytaikhoan&id=<?php echo $row['id_user'] ?>" class="delete">Xóa</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
