<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Ubah Data Tenaga Administrasi</h2>
            <form action="/tenagaadministrasi/update/<?= $tenagaadministrasi['id_tenagaadministrasi']; ?>" method="POST"
                autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_tenagaadministrasi"
                    value="<?= $tenagaadministrasi['id_tenagaadministrasi']; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="<?= $tenagaadministrasi['nama']; ?>" autofocus>
                </div>
                <div class="mb-3">
                    <label for="bagian" class="form-label">Bagian</label><br>
                    <input class="form-control" name="bagian" id="bagian" value="<?= $tenagaadministrasi['bagian']; ?>">
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
            </form>
        </div>
    </div>
</div>
</div>