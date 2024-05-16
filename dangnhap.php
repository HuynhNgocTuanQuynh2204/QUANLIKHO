<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>


    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    
    <link rel="stylesheet" href="css/dangnhap.css">
</head>

<body>

    <div class="main" >
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image" style="margin:0px auto;">
                        <figure ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFFhM0AsEICMphmXyaChHZosn1vBd3Fwh9ytMtS4q1SA&s" alt="sing up image"> </figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form method="POST" class="register-form" id="login-form" action="pages/xulydangnhap.php">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="dangnhap" id="signin" class="form-submit" value="Đăng nhập"/>
                            </div>
                        </form>
                    
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/dangnhap.js"></script>
</body>
</html>