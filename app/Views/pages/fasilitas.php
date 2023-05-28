<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1>Halaman Fasilitas</h1>
<main id="main">

    <!-- ======= Our Team Section ======= -->
    <section id="organisasi">
        <section id="breadcrumbs">
            <div class="container d-flex justify-content-between align-items-center">
                <h1><?= $title ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/pages/beranda">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
            </div>
        </section><!-- End Our Team Section -->

        <!-- ======= Team Section ======= -->
        <section class="fasilitas" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">
                <div class="row mt-2">
                    <h2><?= $fasilitas['judul_fasilitas'] ?></h2>

                    <div class="col-md-4">
                        <img src="/image/fasilitas/<?= $fasilitas['gambar']; ?>" class="img img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h1><?= $fasilitas['judul_fasilitas'] ?></h1>
                            </div>
                            <div class="card-body">
                                <?= $fasilitas['deskripsi'] ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section><!-- End Team Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>