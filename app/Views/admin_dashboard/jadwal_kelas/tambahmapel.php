<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h2>Form Tambah Mata Pelajaran</h2>
            <form action="<?= base_url(); ?>/admin/tambahmapel" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Nama Mata Pelajaran</label>
                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" autofocus required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Tambah</button>
                <a href="/admin/manajemenmapel" class="btn btn-primary btn-lg" role="button">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>