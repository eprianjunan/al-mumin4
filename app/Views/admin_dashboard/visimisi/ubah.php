<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Ubah Visi Misi</h2>
            <form action="/visimisi/update/<?= $visimisi['id_visimisi']; ?>" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_visimisi" value="<?= $visimisi['id_visimisi']; ?>">
                <div class="mb-3">
                    <label for="visi" class="form-label">Visi</label>
                    <input type="text" class="form-control" id="visi" name="visi" value="<?= $visimisi['visi']; ?>"
                        autofocus>
                </div>
                <div class="mb-3">
                    <label for="misi" class="form-label">Misi</label><br>
                    <textarea class="ckeditor" name="misi" id="misi"><?= $visimisi['misi']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
            </form>
        </div>
    </div>
</div>
</div>