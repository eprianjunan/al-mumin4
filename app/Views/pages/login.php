<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet"
        href="<?= base_url(); ?>/login/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/login/css/style.css">

    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(/image/login/cr1.jpeg);">
                    <span class="login100-form-title-1">
                        Login
                    </span>
                </div>
                <form action=<?php echo base_url('/auth/cek_login')?> class="login100-form validate-form" method="post"
                    autocomplete="off">
                    <?php csrf_field() ?>
                    <div class="form-header">
                        <?php 
                            $session = session();
                            $login = $session->getFlashdata('login');
                            $username = $session->getFlashdata('username');
                            $password = $session->getFlashdata('password');
                        ?>
                        <?php if($username){ ?>
                        <p style="color:red"><?php echo $username?></p>
                        <?php } ?>

                        <?php if($password){ ?>
                        <p style="color:red"><?php echo $password?></p>
                        <?php } ?>

                        <?php if($login){ ?>
                        <p style="color:green"><?php echo $login?></p>
                        <?php } ?>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="3-12">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Enter username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="min8">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30 mb-3">
                        <div>
                            <a href="/auth/viewLPassword" class="txt1">
                                Lupa Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" name="login" class="login100-form-btn">
                            Login
                        </button>
                        <a class="btn text-white login100-form-btn" href="/pages/beranda" role="button">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>