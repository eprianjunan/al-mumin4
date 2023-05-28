<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Tambah Fasilitas</h2>
            <?php if (session()->getFlashdata('tidaklengkap')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tidaklengkap'); ?>
            </div>
            <?php endif; ?>
            <form action="/fasilitas/save" method="POST" enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul_fasilitas" name="judul_fasilitas"
                        value="<?= old('judul_fasilitas'); ?>">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert-danger">
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label><br>
                    <textarea class="ckeditor" name="deskripsi" id="deskripsi"><?= old('deskripsi'); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Tambah</button>
                <a href="/fasilitas/index" class="btn btn-primary btn-lg" role="button">Back</a>
            </form>
        </div>
    </div>
</div>
</div>