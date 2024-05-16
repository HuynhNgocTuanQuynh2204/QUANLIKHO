<link rel="stylesheet" href="css/table.css">
<title>Quản lý xuất kho</title>

<body>
    <div class="main p-3">
        <div class="text-center">
            <div class="container" style="padding: 10px;">
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-6">
                        <form class="form-inline" action="index.php?quanly=timkiemxuatkho" method="POST">
                            <div class="input-group w-100">
                                <input type="search" name="tukhoa" class="form-control" placeholder="Nhập mã xuất kho"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <h6 style="text-align: center;padding: 10px;">Tìm kiếm: <?php echo $_POST['tukhoa'];  ?></h6>
            <div class="btn-group">
                <a href="index.php?quanly=xuatkho" class="btn btn-primary">Xuất kho</a>
            </div>
            <div class="header_fixed">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã xuất kho</th>
                            <th>Tên hàng</th>
                            <th>Số lượng</th>
                            <th>Thời gian</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_POST['timkiem'])){
                            $tukhoa = $_POST['tukhoa'];
                        } else{
                            $tukhoa = '';
                        }
                          $sql_lietke_xk = "SELECT * FROM xuatkho WHERE xuatkho.maxuathang LIKE '%" . $tukhoa . "%' ORDER BY maxuathang, id_xk DESC";
                          $query_lietke_xk = mysqli_query($mysqli, $sql_lietke_xk);
                            $i = 0;
                            $current_maxuathang = '';
                            while ($row = mysqli_fetch_array($query_lietke_xk)) {
                                $i++;
                                if($current_maxuathang != $row['maxuathang']){
                                    $current_maxuathang = $row['maxuathang'];
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['maxuathang'] ?></td>
                            <td><?php echo $row['tensanpham'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['thoigian'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['note'] ?></td>
                        </tr>
                        <?php
                                }else{
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?php echo $row['tensanpham'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['thoigian'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['note'] ?></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
