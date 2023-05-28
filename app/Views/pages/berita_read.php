<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section id="beritaRead">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="card" style="margin-bottom: 20px;">
                    <img src="<?= base_url('/image/berita/'.$beritaRead['gambar']) ?>">
                    <div class="card-body">
                        <h3><?= $beritaRead['judul']; ?></h3>
                        <p><?= $beritaRead['deskripsi']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>