<?= $this->include('siswa/sidebar'); ?>

<!-- MAIN CONTENT-->

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <nav
                class="navbar navbar-expand-lg navbar-transparent navbar-fixed-top navbar-light bg-white topbar mb-4 static-top shadow">
                <button class="navbar-toggler" type="button" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
            </nav>
            <div class="row">
                <div class="col-md">
                    <h3 class="title-5 mb-5">Data Siswa</h3>
                    <form action="<?=base_url('siswa/index/');?>" method="post">
                        <div class="row mb-3">
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="text" id="text-input" readonly value="<?= $siswa['nama_siswa']?>"
                                    name="Nama" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label">NIS</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="text" id="text-input" readonly value="<?= $siswa['nis']?>" name="NIP"
                                    placeholder="NIP" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label">Kelas</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="text" id="text-input" name="nama_mapel" readonly
                                    value="<?= $kelas['nama_kelas']?>" placeholder="Kelas" class="form-control">
                            </div>
                        </div>
                    </form>

                    <!-- resetpassword -->
                    <form action="<?= base_url()?>/siswa/resetpassword/<?= $akun['id'] ?>" method="post"
                        enctype="multipart/form-data" class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <strong>Reset Password</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="mb-3">
                                    <div class="col-12 col-md-9">
                                        <label for="usernmae">Username</label>
                                        <input type="text" id="username" name="username" class="form-control"
                                            value="<?= $akun['username']; ?>" readonly>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="password">Input Password Baru</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                        <span class="fa fa-eye-slash" id="view_pass"></span>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" name="akun" value="<?= $akun['id']; ?>">
                                        <input type="hidden" name="siswa_id" value="<?= $akun['siswa_id']; ?>">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
<?= $this->include('siswa/footer'); ?>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->