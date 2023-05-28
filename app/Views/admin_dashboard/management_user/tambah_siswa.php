<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <h2>Form Tambah Siswa</h2>
            <?php if (session()->getFlashdata('tidaklengkap')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tidaklengkap'); ?>
            </div>
            <?php endif; ?>
            <form action="/siswa/save" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s ', time()+60*60*24*3)?>">
                <input type="hidden" name="deadline_at" value="<?= date('Y-m-d H:i:s', time()+60*60*24*180)?>">
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" autofocus
                        autocomplete="off" value="<?= old('nama_siswa'); ?>">
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="number" min="0" class="form-control" id="nis" name="nis" autocomplete="off"
                        value="<?= old('nis'); ?>">
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label><br>
                    <select class="form-control" name="kelas">
                        <option value="">-Pilih-</option>
                        <?php foreach($kelas as $row) : ?>
                        <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label><br>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off"
                        value="<?= old('username'); ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Tambah</button>
                <a href="/siswa/siswa" class="btn btn-primary btn-lg" role="button">Kembali</a>
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