<?= $this->include('guru/sidebar1'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <form action="/guru/saveTugas" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?= csrf_field(); ?>
                        <div class="card">
                            <div class="card-header">
                                <strong>Tambah Tugas</strong>
                            </div>
                            <div class="card-body card-block">
                                <?php if (isset($error)) {?>
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="badge badge-pill badge-danger">Error</span>
                                    <?= $error?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php }?>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Judul</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="judul" placeholder="Judul"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tanggal Posting</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="tgl_buat" placeholder="Tanggal Posting"
                                            readonly value="<?= date('Y-m-d H:i:s')?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Terakhir Pengumpulan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="text-input" name="durasi" placeholder="Durasi"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea class="ckeditor" name="deskripsi" id="deskripsi" rows="9"
                                            placeholder="Isi Pesan..." class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col col-md-3">
                                        <label for="file" class=" form-control-label">Upload Tugas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file" name="file" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <a href="/siswa/listtugas/<?=$idkelas['id_kelas']?>/<?= $mapelid['mapel_id']?>"
                                            class="btn btn-primary btn-sm" class="fa fa-ban" role="button">Back</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>
    <?= $this->include('siswa/footer'); ?>