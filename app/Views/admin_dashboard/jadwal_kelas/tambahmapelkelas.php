<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-7">
            <h2>Form Tambah Mata Pelajaran Kelas</h2>
            <form action="/admin/savemapel" method="POST" enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_mapel" class="form-label">Mata Pelajaran</label><br>
                    <select class="form-control" name="id_mapel" required>
                        <option value="">-Pilih-</option>
                        <?php foreach($mapel as $row) : ?>
                        <option value="<?= $row['id_mapel'] ?>"><?= $row['nama_mapel'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label><br>
                    <select class="form-control" name="id_kelas" required>
                        <option value="">-Pilih-</option>
                        <?php foreach($kelas as $row) : ?>
                        <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Tambah</button>
                <a href="/MapelKelas/mapel_kelas" class="btn btn-primary btn-lg" role="button">Kembali</a>
            </form>
        </div>
    </div>
</div>