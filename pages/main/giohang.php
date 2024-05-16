<h3 style="text-align: center;text-transform: uppercase;font-weight: bold;">Loại hàng cần xuất</h3>
</p>
<?php
   if(isset($_SESSION['cart'])){
   
   }
?>
<?php
   if(isset($_SESSION['hovaten'])){?>
<div class="container">
  <div class="arrow-steps clearfix">
    <div class="step current"> <span> <a href="index.php?quanly=giohang" >Loại hàng cần xuất</a></span> </div>
    <div class="step "> <span><a href="index.php?quanly=vanchuyen" >Địa chỉ nhận</a></span> </div>
    <div class="step "> <span><a href="index.php?quanly=xuatkho" >Lấy đơn hàng xuất</a></span> </div>
  </div>
</div>
<?php
   }
  ?>
<div class="container">
    <div class="table-responsive">
        <table class="table giohang" style="width: 100%; text-align: center;" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Quản lý</th>
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
                    <td>
                        <a href="index.php?quanly=xuatkhosanpham&tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-square-minus"></i></a>
                        <?php echo $cart_item['soluong']; ?>
                        <a href="index.php?quanly=xuatkhosanpham&cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-square-plus"></i></a>
                    </td>
                    
                    <td ><a class="btn btn-danger" href="index.php?quanly=xuatkhosanpham&xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
                </tr>
                <?php
                        }
                ?>
                <tr>
                    <td colspan="8">
                        <p style="float: right;"><a class="btn btn-info" href="index.php?quanly=xuatkhosanpham&xoatatca=1">Xóa tất cả</a></p>
                        <div style="clear: both;"></div>
                        <?php
                            if(isset($_SESSION['hovaten'])){
                        ?>
                        <p><a href="index.php?quanly=vanchuyen" class="btn btn-primary">Hình thức vận chuyển</a></p>
                        <?php
                            }
                            ?>
                    </td>
                </tr>
                <?php
                    }else {
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
