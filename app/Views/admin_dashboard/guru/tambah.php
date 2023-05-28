<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Tambah Guru</h2>
            <?php if (session()->getFlashdata('tidaklengkap')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tidaklengkap'); ?>
            </div>
            <?php endif; ?>
            <form action="/guruadmin/save" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="id_nip" autofocus
                        value="<?= old('id_nip'); ?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                </div>
                <div class="mb-3">
                    <label for="gurumapel" class="form-label">Guru MAPEL</label><br>
                    <input type="text" class="form-control" id="gurumapel" name="gurumapel"
                        value="<?= old('gurumapel'); ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Tambah</button>
            </form>
        </div>
    </div>
</div>
</div>