<div class="main p-3">
    <div class="text-center">
        <section class="container my-2 bg-secondary w-50 text-light p-2">
            <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Thêm sản phẩm</h6>
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xulysanpham" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="validationDefault01" name="tensanpham"
                        placeholder="Tên sản phẩm" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" id="validationDefault01" name="soluong"
                        placeholder="Số lượng" required>
                </div>

                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Ghi chú</label>
                    <input type="text" class="form-control" id="inputPassword4" name="chuthich" placeholder="Ghi chú"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Danh mục</label>
                    <select id="inputState" class="form-select" name="danhmuc">
                        <?php
                            $sql = "SELECT * FROM danhmuc ORDER BY id_dm DESC";
                            $qr = mysqli_query($mysqli, $sql);
                            while ($row = mysqli_fetch_array($qr)) {
                        ?>
                        <option value="<?php echo $row['id_dm']; ?>"><?php echo $row['tendanhmuc']; ?></option>
                        <?php 
                            }
                        ?>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="themsanpham">Thêm sản phẩm</button>
                </div>
            </form>
        </section>
    </div>
</div>