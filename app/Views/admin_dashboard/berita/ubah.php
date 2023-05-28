<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Ubah Berita</h2>
            <?php if (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-warning" role="alert">
                <?= session()->getFlashdata('gagal'); ?>
            </div>
            <?php endif; ?>
            <form action="/berita/update/<?= $berita['id_berita']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $berita['id_berita']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $berita['judul']; ?>"
                        placeholder="judul berita" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label><br>
                    <img src="/image/berita/<?= $berita['gambar']; ?>" width="100">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert-danger">
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label><br>
                    <textarea class="ckeditor" name="deskripsi" id="deskripsi"
                        required><?= $berita['deskripsi']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
            </form>
        </div>
    </div>
</div>
</div>