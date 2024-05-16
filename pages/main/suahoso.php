<?php
   $sql = 'SELECT * FROM user WHERE id_user = '.$_GET['id'];
   $qr = mysqli_query($mysqli,$sql);
   $row = mysqli_fetch_array($qr);
?>
<div class="main p-3">
    <div class="text-center">
        <section class="container my-2 bg-secondary w-50 text-light p-2">
            <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Sửa thông cá nhân</h6>
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xulysuahoso&id=<?php echo $row['id_user'] ?>"
                enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="validationDefault01" name="tenql"
                        placeholder="Họ và tên" value="<?php echo $row['hovaten'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="inputPassword4" name="matkhau"
                        value="<?php echo $row['password'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Avatar</label>
                    <input type="file" class="form-control" id="inputPassword4" name="avatar"
                        value="<?php echo $row['avatar'] ?>">
                        <img src="images/avatar/<?php echo $row['avatar'] ?>" width="100px" alt="">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="suahoso">Sửa thông tin</button>
                </div>
            </form>
        </section>
    </div>
</div>