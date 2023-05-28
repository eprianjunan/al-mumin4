<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Ubah fasilitas</h2>
            <form action="/fasilitas/update/<?= $fasilitas['id_fasilitas']; ?>" method="POST"
                enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_fasilitas" value="<?= $fasilitas['id_fasilitas']; ?>">
                <div class="mb-3">
                    <label for="judul_fasilitas" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul_fasilitas" name="judul_fasilitas"
                        value="<?= $fasilitas['judul_fasilitas']; ?>" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label><br>
                    <img src="/image/fasilitas/<?= $fasilitas['gambar']; ?>" width="100">
                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label><br>
                    <textarea class="ckeditor" name="deskripsi"
                        id="deskripsi"><?= $fasilitas['deskripsi']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
                <a href="/fasilitas/index" class="btn btn-primary btn-lg" role="button">Back</a>
            </form>
        </div>
    </div>
</div>
</div>