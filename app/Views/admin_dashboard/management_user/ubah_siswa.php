<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <h2>Form Ubah siswa</h2>
            <form action="/siswa/update/<?= $siswa['id_siswa']; ?>" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $siswa['id_siswa']; ?>">
                <input type="hidden" name="id" value="<?= $akun['id']; ?>">
                <input type="hidden" name="id_kelas" value="<?= $kelas_siswa['id_kelassiswa']; ?>">
                <div class="mb-3">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                        value="<?= $siswa['nama_siswa']; ?>" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-control" name="kelas">
                        <option value="">-Pilih-</option>
                        <?php foreach($kelas as $row) : ?>
                        <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
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
                <a href="/siswa/siswa" class="btn btn-primary btn-lg" role="button">Back</a>
            </form>
        </div>
    </div>
</div>
</div>
<script>
$(document).on('click', '#view_pass', function(e) {
    e.preventDefault();
    var password = $("#password").val();
    if ($("#password").hasClass("active")) {
        $("#password").attr('type', 'text');
        $("#password").removeClass("active");

    } else {
        $("#password").attr('type', 'password');
        $("#password").addClass("active");
    }
});
</script>