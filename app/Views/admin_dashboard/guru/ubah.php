<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <h2>Form Ubah Data Guru</h2>
            <form action="/guruadmin/update/<?= $guru['id_guru']; ?>" method=" POST" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_guru" value="<?= $guru['id_guru']; ?>">
                <div class="mb-3">
                    <label for="id_nip" class="form-label">ID_nip</label>
                    <input type="text" class="form-control" id="id_nip" name="id_nip" value="<?= $guru['id_nip']; ?>"
                        autofocus>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $guru['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="gurumapel" class="form-label">Guru Mapel</label><br>
                    <input type="text" class="form-control" name="gurumapel" id="gurumapel"
                        value="<?= $guru['gurumapel']; ?>">
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
            </form>
        </div>
    </div>
</div>
</div>