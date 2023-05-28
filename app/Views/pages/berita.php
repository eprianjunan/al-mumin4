<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section id="beritapages">
    <!-- Tentang Berita -->
    <h2>Berita</h2>

    <div class="container">
        <div class="row mt-4">
            <?php foreach ($berita as $row) : ?>
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="/image/berita/<?= $row['gambar']; ?>" class="card-img-top" alt="card1" width="200"
                        height="200">
                    <div class="card-body">
                        <p><?= $row['judul']; ?></p>
                        <p><?= substr($row['deskripsi'], 0, 10) ?>...</p>
                        <a href="<?= base_url('/pages/beritaRead/'.$row['slug_berita']) ?>" class="btn btn-success">
                            <i class="fas fa-chevron-right"></i> Baca...
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Akhir tentang berita -->
    <?= $pager->links('berita', 'berita_pagination'); ?>
</section>

<?= $this->endSection(); ?>