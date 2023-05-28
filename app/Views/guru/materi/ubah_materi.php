<?= $this->include('guru/sidebar'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <form
                        action="<?= base_url('guru/updateMateri/'. $materi['id_materi'] . '/' . $idkelas['id_kelas']. '/' . $mapel['id_mapel']); ?>"
                        method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $materi['id_materi']; ?>">
                        <div class="card">
                            <div class="card-header">
                                <strong>Ubah Materi</strong>
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
                                <input type="hidden" name="pengajar_id" value="<?= $materi['pengajar_id']; ?>">
                                <input type="hidden" name="id" value="<?= $materi['id_materi']; ?>">
                                <input type="hidden" name="mapel_id" value="<?= $mapel['id_mapel']; ?>">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">judul</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="judul" value="<?= $materi['judul']; ?>"
                                            class="form-control">
                                        <small class="form-text text-muted">Tulislah Judul pengumuman yang sesuai dengan
                                            Materi</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Kelas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" readonly
                                            value="<?= $idkelas['nama_kelas']; ?>" name="kelas" placeholder="Judul"
                                            class="form-control">
                                        <input type="hidden" id="text-input" value="<?= $idkelas['id_kelas']; ?>"
                                            name="idkelas" placeholder="Judul" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Mata Pelajaran</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" readonly value="<?= $mapel['nama_mapel']; ?>"
                                            name="mapel" placeholder="Judul" class="form-control">
                                        <input type="hidden" id="text-input" value="<?= $mapel['id_mapel']; ?>"
                                            name="idmapel" placeholder="Judul" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tanggal</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="tanggal"
                                            placeholder="Tanggal Pengumuman" readonly value="<?= date('Y-m-d H:i:s')?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea class="ckeditor" name="deskripsi" id="deskripsi" rows="9"
                                            class="form-control"><?= $materi['deskripsi']; ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col col-md-3">
                                        <label for="files" class=" form-control-label">Upload Materi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                    <?= form_open_multipart('guru/updateMateri/') ?>
                                        <input type="file" id="files" name="files[]" class="form-control" value="<?= $materi['files']; ?>" multiple
                                            required>
                                        <?= form_close() ?>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <a href="/guru/listmateri/<?=$idkelas['id_kelas']?>/<?= $mapel['id_mapel']?>"
                                        class="btn btn-primary btn-sm" class="fa fa-ban" role="button">Back</a>
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
    <?= $this->include('guru/footer'); ?>