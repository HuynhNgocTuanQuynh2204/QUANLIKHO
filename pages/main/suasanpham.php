<?php
    $sql = 'SELECT * FROM sanpham WHERE id_sp = '.$_GET['id'];
    $qr = mysqli_query($mysqli,$sql);
    $row_sp = mysqli_fetch_array($qr);
?>
<div class="main p-3">
    <div class="text-center">
        <section class="container my-2 bg-secondary w-50 text-light p-2">
            <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Sửa sản phẩm</h6>
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xulysanpham&id=<?php echo $row_sp['id_sp'] ?>" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="validationDefault01" name="tensanpham" placeholder="Tên sản phẩm" value="<?php echo $row_sp['tensanpham']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" id="validationDefault02" name="soluong" placeholder="Số lượng" value="<?php echo $row_sp['soluong']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Ghi chú</label>
                    <input type="text" class="form-control" id="inputPassword4" name="chuthich" placeholder="Ghi chú" value="<?php echo $row_sp['chuthich']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Danh mục</label>
                    <select id="inputState" class="form-select" name="danhmuc">
                        <?php
                        $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_dm DESC";
                        $qr_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($qr_danhmuc)) {
                            $selected = ($row_danhmuc['id_dm'] == $row_sp['id_dm']) ? "selected" : "";
                        ?>
                        <option <?php echo $selected ?> value="<?php echo $row_danhmuc['id_dm']; ?>"><?php echo $row_danhmuc['tendanhmuc']; ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="suasanpham">Lưu sản phẩm</button>
                </div>
            </form>
        </section>
    </div>
</div>
