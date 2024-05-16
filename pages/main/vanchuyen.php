<h3 style="text-align: center;text-transform: uppercase;font-weight: bold;">Thông tin vận chuyển</h3>
<div class="container">
    <?php if(isset($_SESSION['hovaten'])) { ?>
        <div class="arrow-steps clearfix">
            <div class="step done "> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
            <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Địa chỉ nhận</a></span> </div>
            <div class="step "> <span><a href="index.php?quanly=xuatkho" >Lấy đơn hàng xuất</a></span> </div>
        </div>
    <?php } ?>
    
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="index.php?quanly=xuat" autocomplete="off" method="POST">
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" placeholder="...." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <input type="text" name="note" placeholder="...." class="form-control" >
                        </div>
                        <div class="form-group">
                            <button type="submit" name="xuat" class="btn btn-primary">Xuất</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table giohang" style="width: 100%; text-align: center;" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_SESSION['cart'])){
                        $i=0;
                        $tongtien=0;
                        foreach($_SESSION['cart'] as $cart_item){
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cart_item['tensanpham']; ?></td>
                                <td><?php echo $cart_item['soluong']; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
