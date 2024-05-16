<?php
   $sql = 'SELECT * FROM danhmuc WHERE id_dm = '.$_GET['id'];
   $qr = mysqli_query($mysqli,$sql);
   $row = mysqli_fetch_array($qr);
?>
<div class="main p-3">
    <div class="text-center">
        <section class="container my-2 bg-secondary w-50 text-light p-2">
            <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Sửa danh mục</h6>
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xulydanhmuc&id=<?php echo $row['id_dm'] ?>"
                enctype="multipart/form-data">
                <div class="col-md-6">
                <label for="validationDefault01" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" id="validationDefault01" name="tendanhmuc"
                        placeholder="Tên danh mục" value="<?php echo $row['tendanhmuc'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Ghi chú</label>
                    <input type="text" class="form-control" id="inputPassword4" name="ghichu"
                        value="<?php echo $row['ghichu'] ?>">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="suadanhmuc">Sửa danh mục</button>
                </div>
            </form>
        </section>
    </div>
</div>