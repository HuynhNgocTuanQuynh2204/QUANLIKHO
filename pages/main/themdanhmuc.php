<div class="main p-3">
    <div class="text-center">
        <section class="container my-2 bg-secondary w-50 text-light p-2">
        <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Thêm danh mục</h6>
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xulydanhmuc" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" id="validationDefault01" name="tendanhmuc" placeholder="Tên danh mục"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Ghi chú</label>
                    <input type="text" class="form-control" id="inputPassword4" name="ghichu" placeholder="Ghi chú" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm danh mục</button>
                </div>
            </form>
        </section>
    </div>
</div>