<?= $this->include('admin_dashboard/sidebar'); ?>

<!-- Navbar -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Profile</h3>
                <div class="filters">
                    <form action="<?=base_url('admin/index/');?>" method="post">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" readonly value="<?= $admin['username']?>" name="Nama"
                                    placeholder="Nama" class="form-control">
                            </div>
                        </div>
                        </div>
                    </form>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                                <?php endif; ?>
                    <!-- resetpassword -->
                    <form action="<?= base_url()?>/admin/resetpassword/<?= $admin['id'] ?>" method="post"
                        enctype="multipart/form-data" class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <strong>Reset Account</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="mb-3">
                                    <div class="col-12 col-md-9">
                                        <label for="usernmae">Username</label>
                                        <input type="text" id="username" name="username" class="form-control"
                                            value="<?= $admin['username']; ?>">
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="password">Input Password Baru</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                        <span class="fa fa-eye-slash" id="view_pass"></span>
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
                <!-- END MAP DATA-->
            </div>
        </div>
    </div>
</div>

<!-- End Navbar -->
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