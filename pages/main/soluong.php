<?php
 
    $id = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE id_sp ='".$id."' LIMIT 1";
    $qr = mysqli_query($mysqli,$sql);
    $row_sp = mysqli_fetch_array($qr);
?>

<div class="main p-3">
    <div class="text-center">
        <section class="container my-2 bg-secondary w-50 text-light p-2">
            <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Tổng số lượng trong kho: <?php echo $row_sp['soluong'] ?></h6>
            <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Nhập số lượng cần xuất</h6>
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xuatkhosanpham&id=<?php echo $row_sp['id_sp']; ?>" enctype="multipart/form-data">
                <div class="col-md-12">
                    <label for="validationDefault01" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" id="validationDefault01" name="soluong" placeholder="Nhập số lượng" >
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="xuatkho">Xuất kho</button>
                </div>
            </form>
        </section>
    </div>
</div>
