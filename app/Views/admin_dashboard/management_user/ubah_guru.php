<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <h2>Form Ubah guru</h2>
            <form action="/guru/update/<?= $akun['pengajar_id']; ?>" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $guru['guru_id']; ?>">
                <input type="hidden" name="id" value="<?= $akun['id']; ?>">
                <input type="hidden" name="id_mapelguru" value="<?= $mapel['id_mapelguru']; ?>">
                <div class="mb-3">
                    <label for="nama_guru" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru"
                        value="<?= $guru['nama_guru']; ?>" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="<?= $guru['nip']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="id_mapel" class="form-label">Mata Pelajaran</label>
                    <select class="form-control" name="id_mapel">
                        <option value="">-Pilih-</option>
                        <?php foreach($matpel as $row) : ?>
                        <option value="<?= $row['id_mapel'] ?>"><?= $row['nama_mapel'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?= $akun['username']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="text-input" class=" form-control-label">Password</label>
                    <input type="password" id="text-input" readonly value="<?= $akun['password']?>" name="password"
                        class="form-control">
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
                <a href="/guru/guru" class="btn btn-primary btn-lg" role="button">Back</a>
            </form>
        </div>
    </div>
</div>
</div>