<?php 
use App\Models\guru_Model;
$this->guru_Model    = new guru_Model();

$session = \Config\Services::session();
$id = $session->get('pengajar_id');
$namaguru = $this->guru_Model->where(['guru_id'=>$id])->first();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Guru
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?= base_url(); ?>/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <!-- Fontawesome -->
    <link href="<?= base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/sb-admin.css" rel="stylesheet">

    <!-- Textarea editor -->
    <script src="//cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>

    <!-- style css -->
    <style>
    input[type=submit] {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        opacity: 0.6;
        transition: 0.3s;
        font-size: 16px;
        margin: 4px 2px;
        opacity: 0.6;
        transition: 0.3s;
        display: inline-block;
        text-decoration: none;
        cursor: point
    }

    .button {
        display: inline-block;
        border-radius: 139px;
        background-color: #1E90FF;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 14px;
        padding: 100px;
        width: 100px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 15px;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

    .button p {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button p:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }
    .button:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);}
        .button:hover p {
            padding-right: 125px;
        }

    .button:hover p:after {
        opacity: 10;
        right: 0;
    }
    </style>
</head>

<body class="">

    <div class="wrapper ">
        <div class="sidebar" data-color="green" data-background-color="white">
            <div class="sidebar-wrapper">
                <div class="logo"><a href="" class="simple-text logo-normal text-white" style="text-decoration: none;">
                        <img src="/image/LogoYayasan.png" alt="" width="85" height="85" class="d-inline-block">
                        <div class="sidebar-brand-text mt-3 mx-10"><?= 
                        $namaguru['nama_guru']; 
                        ?></div>
                    </a></div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="button nav-link text-white" style="border-radius: 10px; background-color:deepskyblue"
                            href="/guru/beranda" type="submit">
                            <i class="material-icons text-white">person</i>
                            <p>Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="button nav-link text-white" style="border-radius: 10px; background-color:deepskyblue"
                            href="/guru/materi">
                            <i class="material-icons text-white">content_paste</i>
                            <p>Kelola Materi</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="button input nav-link text-white" style="border-radius: 10px; background-color:deepskyblue"
                            href="/guru/tugas">
                            <i class="material-icons text-white">library_books</i>
                            <p>Kelola Tugas</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="button nav-link text-white" style="border-radius: 10px; background-color:deepskyblue"
                            href="/guru/cetaklaporan">
                            <i class="material-icons text-white">print</i>
                            <p>Cetak Laporan</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="button nav-link text-white" style="border-radius: 10px; background-color:deepskyblue"
                            href="/auth/logout" data-toggle="modal" data-target="#logoutModal">
                            <i class="material-icons text-white">notifications</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="main-panel">
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar?
                            </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Tekan tombol "Logout" jika anda yakin dan "Cancel" jika
                            ingin dibatalkan</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="/auth/logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="../assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="../assets/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../assets/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

</html>