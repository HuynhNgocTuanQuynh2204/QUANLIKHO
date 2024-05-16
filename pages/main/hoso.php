<link rel="stylesheet" href="css/table.css">
<div class="main p-3">
    <div class="text-center">
        <?php
        $sql = "SELECT * FROM user
        ORDER BY id_user DESC";
        $qr = mysqli_query($mysqli, $sql);
        ?>

        <body>
            <div class="main p-3">
                <div class="text-center">
                    <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Hồ sơ người dùng</h6>
                    <div class="header_fixed">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Họ và tên</th>
                                    <th>Tài khoản</th>
                                    <th>Mật khẩu</th>
                                    <th>Sửa</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                                    <td><a href="index.php?quanly=suahoso&id=<?php echo $row['id_user'] ?>"
                                            class="sua">Cập nhập thông tin</a></td>
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

    </div>
</div>