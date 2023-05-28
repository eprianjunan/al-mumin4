<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <h2>Form Tambah Guru</h2>
            <?php if (session()->getFlashdata('tidaklengkap')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tidaklengkap'); ?>
            </div>
            <?php endif; ?>
            <form action="/guru/save" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s ', time()+60*60*24*3)?>">
                <input type="hidden" name="deadline_at" value="<?= date('Y-m-d H:i:s', time()+60*60*24*180)?>">
                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" autofocus autocomplete="off"
                        value="<?= old('nama_guru'); ?>">
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="number" min="0" class="form-control" id="nip" name="nip" autocomplete="off"
                        value="<?= old('nip'); ?>">
                </div>
                <div class="mb-3">
                    <label for="id_mapel" class="form-label">Mata Pelajaran</label><br>
                    <select class="form-control" name="id_mapel">
                        <option value="">-Pilih-</option>
                        <?php foreach($mapel as $row) : ?>
                        <option value="<?= $row['id_mapel'] ?>"><?= $row['nama_mapel'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label><br>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off"
                        value="<?= old('username'); ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Tambah</button>
                <a href="/guru/guru" class="btn btn-primary btn-lg" role="button">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>