<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Tambah Tenaga Administrasi</h2>
            <?php if (session()->getFlashdata('tidaklengkap')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tidaklengkap'); ?>
            </div>
            <?php endif; ?>
            <form action="/tenagaadministrasi/save" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                </div>
                <div class="mb-3">
                    <label for="bagian" class="form-label">Bagian</label><br>
                    <input type="text" class="form-control" id="bagian" name="bagian" value="<?= old('bagian'); ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>