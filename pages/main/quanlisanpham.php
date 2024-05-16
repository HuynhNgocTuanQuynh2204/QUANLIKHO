<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <div class="main p-3">
        <div class="text-center">
            <div class="container" style="padding: 10px;">
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-6">
                        <form class="form-inline" action="index.php?quanly=timkiemsanpham" method="POST">
                            <div class="input-group w-100">
                                <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên sản phẩm"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="btn-group">
                <a href="index.php?quanly=themsanpham" class="btn btn-primary">Thêm sản phẩm</a>
            </div>
            <div class="header_fixed">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên hàng</th>
                            <th>Số lượng</th>
                            <th>Tên danh mục</th>
                            <th>Ghi chú</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_dm = danhmuc.id_dm ORDER BY sanpham.id_sp DESC";
                            $qr = mysqli_query($mysqli, $sql);
                            $i = 0;
                            while ($row = mysqli_fetch_array($qr)) {
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['tensanpham'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['tendanhmuc'] ?></td>
                            <td><?php echo $row['chuthich'] ?></td>
                            <td><a href="index.php?quanly=suasanpham&id=<?php echo $row['id_sp'] ?>" class="sua">Sửa</a></td>
                            <td><a href="index.php?quanly=xulysanpham&id=<?php echo $row['id_sp'] ?>" class="delete">Xóa</a></td>
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
