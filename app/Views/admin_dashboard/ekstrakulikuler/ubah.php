<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Ubah ekstrakulikuler</h2>
            <form action="/ekstrakulikuler/update/<?= $ekstrakulikuler['id_ekstrakulikuler']; ?>" method="POST"
                enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_ekstrakulikuler" value="<?= $ekstrakulikuler['id_ekstrakulikuler']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul"
                        value="<?= $ekstrakulikuler['judul']; ?>" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label><br>
                    <img src="/image/ekstrakulikuler/<?= $ekstrakulikuler['gambar']; ?>" width="100">
                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label><br>
                    <textarea class="ckeditor" name="deskripsi" id="deskripsi"
                        required><?= $ekstrakulikuler['deskripsi']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
                <a href="/ekstrakulikuler/index" class="btn btn-primary btn-lg" role="button">Back</a>
            </form>
        </div>
    </div>
</div>
</div>