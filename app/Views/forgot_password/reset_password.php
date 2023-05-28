<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="/login/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="/login/css/style.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(/image/login/cr1.jpeg);">
                    <span class="login100-form-title-1">
                        Reset Password
                    </span>
                </div>
                <form action="<?= base_url(); ?>/auth/reset_password" class="login100-form validate-form" method="post">
                    <?= csrf_field(); ?>
                    <?php 
                            $session = session();
                            $email = $session->getFlashdata('email');
                        ?>
                    <?php if($email){ ?>
                    <p style="color:red"><?php echo $email?></p>
                    <?php } ?>
                    <input type="hidden" name="id" value="<?= $resetpassword['id']; ?>">
                    <input type="hidden" name="username" value="<?= $resetpassword['username']; ?>">
                    <div class="wrap-input100 validate-input m-b-30">
                        <span class="label-input100">Enter New Password</span>
                        <input class="input100" type="password" name="password" id="password"
                            placeholder="Enter New Password">
                    </div>
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Confirm New Password</span>
                        <input class="input100" type="password" name="repassword" id="repassword"
                            placeholder="Confirm New Password">
                    </div>

                    <div class="container-login100-form-btn mt-3">
                        <button type="submit" name="submit" class="login100-form-btn" onclick="return Validate()">
                            Submit

                        </button>
                        <a class=" btn text-white login100-form-btn" href="/pages/beranda" role="button">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/login/js/jquery-3.3.1.min.js"></script>
    <script src="/login/js/jquery.form-validator.min.js"></script>
    <script src="/login/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("repassword").value;
        if (password != confirmPassword) {
            alert("Password tidak sesuai");
            return false;
        }
        return true;
    }
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>