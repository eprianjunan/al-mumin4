<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Textarea editor -->
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
                <div class="sidebar-brand-icon">
                    <img src="/image/LogoYayasan.png" alt="" width="60" height="60" class="d-inline-block">
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Data Halaman
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Beranda</h6>
                        <a class="collapse-item" href="/tentangkami/index">Tentang Kami</a>
                        <a class="collapse-item" href="/sambutan/index">Sambutan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Berita -->
            <li class="nav-item">
                <a class="nav-link" href="/berita/index">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Berita</span></a>
            </li>

            <!-- Nav Item - Profil -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-id-card"></i>
                    <span>Profil</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Setting Profil</h6>
                        <a class="collapse-item" href="/visimisi/index">Visi & Misi</a>
                        <a class="collapse-item" href="/kepalasekolah/index">Kepala Sekolah</a>
                        <a class="collapse-item" href="/guruadmin/index">Guru</a>
                        <a class="collapse-item" href="/tenagaadministrasi/index">Tenaga Administrasi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/fasilitas/index">
                    <i class="fas fa-door-closed"></i>
                    <span>Fasilitas</span></a>
            </li>

            <!-- Ekstrakulikuler -->
            <li class="nav-item">
                <a class="nav-link" href="/ekstrakulikuler/index">
                    <i class="fas fa-sitemap"></i>
                    <span>Ekstrakulikuler</span></a>
            </li>

            <!-- Nav Item - Berita -->
            <li class="nav-item">
                <a class="nav-link" href="/kontak/index">
                    <i class="fas fa-phone-square-alt"></i>
                    <span>Kontak</span></a>
            </li>

            <!-- Kelola data pengguna -->
            <div class="sidebar-heading">
                Kelola Data Pengguna
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/guru/guru">
                    <i class="fas fa-users"></i>
                    <span>Guru</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/siswa/siswa">
                    <i class="fas fa-users"></i>
                    <span>Siswa</span></a>
            </li>

            <!-- Kelola jadwal pelajaran -->
            <div class="sidebar-heading">
                Kelola Jadwal Pelajaran
            </div>
            
            <li class="nav-item">
                <a class="nav-link" href="/admin/manajemenmapel">
                    <i class="fas fa-book-reader"></i>
                    <span>Manajemen MAPEL</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/MapelKelas/mapel_kelas">
                    <i class="fas fa-book-reader"></i>
                    <span>Mata Pelajaran Kelas</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <span id="tanggalwaktu"></span>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">August Nugraha</span>
                                <img class="img-profile rounded-circle" src="/assets/img/admin.jpeg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/admin/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="/auth/logout">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- js -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                    crossorigin="anonymous"></script>
                <!-- Bootstrap core JavaScript-->
                <script src="/assets/vendor/jquery/jquery.min.js"></script>
                <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="/assets/js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="/assets/vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="/assets/js/demo/chart-area-demo.js"></script>
                <script src="/assets/js/demo/chart-pie-demo.js"></script>
                <script>
                var dt = new Date();
                document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();
                </script>

</body>

</html>