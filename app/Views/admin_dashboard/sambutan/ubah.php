<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Ubah Sambutan</h2>
            <form action="/sambutan/update/<?= $sambutan['id_sambutan']; ?>" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_sambutan" value="<?= $sambutan['id_sambutan']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $sambutan['judul']; ?>"
                        autofocus required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label><br>
                    <img src="/image/<?= $sambutan['gambar']; ?>" width="100">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert-danger">
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label><br>
                    <textarea class="ckeditor" name="deskripsi" id="deskripsi"><?= $sambutan['deskripsi']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
            </form>
        </div>
    </div>
</div>
</div>