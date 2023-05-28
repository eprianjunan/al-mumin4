<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide pt-4" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/image/cr1.jpeg" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
            <img src="/image/cr2.jpeg" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item pt-1">
            <img src="/image/cr3.jpeg" class="d-block w-100" alt="..." />
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Akhir Carousel -->

<!-- Tentang Kami -->
<section id="tentangkami">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h2><?= $tentangkami['judul']; ?></h2>
                <hr class="mb-4 mt-2 d-inline-block mx-auto"
                    style="width: 65px; background-color: #0a7600; height: 5px">
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-6">
                <img src="/image/<?= $tentangkami['gambar']; ?>" width="500" height="330">
            </div>
            <div class="col-md-6">
                <p><?= $tentangkami['deskripsi']; ?></p>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Tentang Kami -->

<!-- Sambutan -->
<section class="sambutan">
    <div class="container">
        <div class="row justify-text-center">
            <div class="col text-center pb-3">
                <h2 class="fs-2">
                    <?= $sambutan['judul']; ?>
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <img src="/image/<?= $sambutan['gambar']; ?>" alt="KetuaYayasan" width="300" height="200" />
            </div>
            <div class="col-md-8">
                <p class="lead text-start">
                    <?= $sambutan['deskripsi']; ?>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Sambutan -->

<!-- Berita -->
<section id="berita">
    <div class="container">
        <div class="row text-center">
            <div class="col pt-3 pb-3">
                <h2>Berita</h2>
                <hr class="mb-4 mt-1 d-inline-block mx-auto"
                    style="width: 65px; background-color: #0a7600; height: 5px">
            </div>
        </div>
        <div class="row">
            <?php foreach($berita as $row) : ?>
            <div class="col-md-3 mb-3">
                <div class="card shadow">
                    <div class="inner">
                        <img src="/image/berita/<?= $row['gambar']; ?>" class="card-img-top" alt="card1" width="200"
                            height="200" />
                    </div>
                    <div class="card-body">
                        <?= $row['judul']; ?>
                        <p class="card-text"><?= substr($row['deskripsi'], 0, 10) ?></p>
                        <a href="<?= base_url('/pages/beritaRead/'.$row['slug_berita']) ?>" class="btn btn-success">
                            <i class="fas fa-chevron-right"></i> Baca...
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="selengkapnya col-1 mx-auto pt-3">
        <a class="btn btn-outline-secondary btn-sm" href="/pages/berita" role="button">Selengkapnya</a>
    </div>
    </div>
</section>
<!-- Akhir Berita -->

<!-- Kontak -->
<section id="kontak">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Kontak</h2>
            </div>
        </div>
        <?php foreach($kontak as $row) : ?>
        <div class="row text-center">
            <div class="col-md-4">
                <i class="bi bi-phone"></i>
                <p>
                    <?= $row['notelp']; ?> <br>
                    Senin - Jumat (9am - 5pm)
                </p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-envelope"></i>
                <p>Email <br> <?= $row['email']; ?></p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-geo-alt"></i>
                <p>
                    Lokasi <br> <?= $row['lokasi']; ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Akhir Kontak -->

<!-- Lokasi & E-mail -->
<section id="lokasi" class="mt-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md text-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.0143772095475!2d107.82353321477476!3d-7.239198194774256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68bb7724cda01d%3A0x98e3b7571a980fc5!2sRA.%20AL-MU&#39;MIN%20PASIRWANGI!5e0!3m2!1sid!2sid!4v1628074434321!5m2!1sid!2sid"
                    width="1000" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
</section>
<!-- Akhir Lokasi dan email -->
<?= $this->endSection(); ?>