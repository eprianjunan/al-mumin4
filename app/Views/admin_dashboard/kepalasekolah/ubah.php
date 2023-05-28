<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Ubah Kepala Sekolah</h2>
            <form action="/kepalasekolah/update/<?= $kepalasekolah['id_kepsek']; ?>" method="POST"
                enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_kepsek" value="<?= $kepalasekolah['id_kepsek']; ?>">
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label><br>
                    <img src="/image/<?= $kepalasekolah['gambar']; ?>" width="100">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert-danger">
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label><br>
                    <textarea class="ckeditor" name="deskripsi" id="deskripsi" cols="61"
                        rows="10"><?= $kepalasekolah['deskripsi']; ?>"</textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
            </form>
        </div>
    </div>
</div>
</div>