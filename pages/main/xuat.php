<?php

if(isset($_SESSION['cart']) && isset($_POST['address']) && isset($_POST['note'])){
    $address = $_POST['address'];
    $note = $_POST['note'];
    $maxuatkho = rand(0, 999999);

    $sql_xuatkho = "INSERT INTO xuatkho (maxuathang,tensanpham, soluong, diachi, note) VALUES ";

    foreach($_SESSION['cart'] as $cart_item){
        $tensanpham = $cart_item['tensanpham'];
        $soluong = $cart_item['soluong'];

        // Lấy số lượng sản phẩm từ cơ sở dữ liệu
        $sql_soluong = "SELECT soluong FROM sanpham WHERE tensanpham='$tensanpham'";
        $result = mysqli_query($mysqli, $sql_soluong);
        $row = mysqli_fetch_assoc($result);
        $soluong_cu = $row['soluong'];

        // Trừ số lượng sản phẩm xuất ra khỏi số lượng sản phẩm hiện có
        $soluong_moi = $soluong_cu - $soluong;

        // Cập nhật lại số lượng sản phẩm trong cơ sở dữ liệu
        $sql_capnhat = "UPDATE sanpham SET soluong='$soluong_moi' WHERE tensanpham='$tensanpham'";
        mysqli_query($mysqli, $sql_capnhat);

        // Thêm thông tin xuất hàng vào bảng xuatkho
        $sql_xuatkho .= "('$maxuatkho','$tensanpham', '$soluong', '$address', '$note'),";
    }

    // Xóa dấu ',' ở cuối câu lệnh SQL
    $sql_xuatkho = rtrim($sql_xuatkho, ",");

    // Thực thi câu lệnh SQL
    if(mysqli_query($mysqli, $sql_xuatkho)){
        // Xóa giỏ hàng sau khi đã xuất
        unset($_SESSION['cart']);
        echo '<script type="text/javascript">alert("Xuất hàng thành công!");   window.location.href = "index.php?quanly=quanlixuatkho"; </script>';
    } else {
        echo '<script type="text/javascript">alert("Có lỗi xảy ra, vui lòng thử lại!");   window.location.href = "index.php?quanly=vanchuyen"; </script>';
    }
} else {
    echo '<script type="text/javascript">alert("Vui lòng điền đầy đủ thông tin!");   window.location.href = "index.php?quanly=vanchuyen"; </script>';
}
?>
