<!-- Header -->
<?php 
use App\Models\Menu_model;
$menu         = new Menu_model();
$menu_fasilitas  = $menu->fasilitas();
$menu_ekstrakulikuler  = $menu->ekstrakulikuler();
?>
<section id="header" class="fixed-top">
    <!-- Topbar -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center"><i class="bi bi-envelope-fill"></i><a
                    href="mtssalmu39min@yahoo.com">mtssalmu39min@yahoo.com</a> <i
                    class="bi bi-phone-fill phone-icon"></i><span>+62 852-2119-3385</span></div>
            <div class="social-links d-none d-md-block">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </section>
    <!-- Akhri Topbar -->

    <!-- Navbar -->
    <section class="myNav">
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #005aab">
            <div class="container">
                <a class="navbar-brand" href="/pages/beranda">
                    <img src="/image/LogoYayasan.png" alt="" width=" 50" height="50" class="d-inline-block" />
                    Yayasan Pendidikan Islam Al - Mu'min
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/pages/ppdb">PPDB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/pages/berita">Berita</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"> Profil </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/pages/profil/#visimisi">Visi & Misi</a></li>
                                <li><a class="dropdown-item" href="/pages/profil/#kepsek">Kepala Sekolah</a></li>
                                <li><a class="dropdown-item" href="/pages/profil/#guru">Guru</a></li>
                                <li><a class="dropdown-item" href="/pages/profil/#tenadm">Tenaga Administrasi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"> Fasilitas </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php foreach($menu_fasilitas as $menu_fasilitas) { ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo base_url('pages/Fasilitas/'.$menu_fasilitas['slug_fasilitas']) ?>"><?php echo $menu_fasilitas['judul_fasilitas'] ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"> Ekstrakulikuler </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php foreach($menu_ekstrakulikuler as $menu_ekstrakulikuler) { ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo base_url('pages/Ekstrakulikuler/'.$menu_ekstrakulikuler['slug_ekstrakulikuler']) ?>"><?php echo $menu_ekstrakulikuler['judul'] ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/pages/beranda/#kontak">Kontak</a>
                        </li>
                    </ul>
                    <a class="btn btn-light rounded-pill" href="/pages/login" role="button">Login</a>
                </div>
            </div>
        </nav>
    </section>
    <!-- Akhir navbar -->
</section>
<!-- Akhir Header -->