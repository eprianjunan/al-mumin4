<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <h2>Reset Password</h2>
            <form action="/siswa/reset/<?= $akun['siswa_id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $akun['id']; ?>">
                <input type="hidden" name="username" value="<?= $akun['username']; ?>">
                <div class="mb-3">
                    <label for="nama_guru" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" readonly value="<?= $siswa['nama_siswa']; ?>">
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Reset</button>
                <a href="/guru/guru" class="btn btn-primary btn-lg" role="button">Back</a>
            </form>
        </div>
    </div>
</div>
</div>