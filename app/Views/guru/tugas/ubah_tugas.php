<?= $this->include('guru/sidebar'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <form
                        action="<?= base_url('guru/updateTugas/'. $tugas['id_tugas'] . '/' . $idkelas['id_kelas']. '/' . $mapel['id_mapel']) ?>"
                        method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_tugas" value="<?= $tugas['id_tugas']; ?>">
                        <div class="card">
                            <div class="card-header">
                                <strong>Ubah tugas</strong>
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
                                <input type="hidden" name="pengajar_id" value="<?= $tugas['pengajar_id']; ?>">
                                <input type="hidden" name="id_tugas" value="<?= $tugas['id_tugas']; ?>">
                                <input type="hidden" name="mapel_id" value="<?= $mapel['id_mapel']; ?>">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Judul</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="judul" value="<?= $tugas['judul']; ?>"
                                            class="form-control">
                                        <small class="form-text text-muted">Tulislah Judul pengumuman yang sesuai dengan
                                            tugas</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tanggal</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="tgl_buat"
                                            placeholder="Tanggal Pengumuman" readonly value="<?= date('Y-m-d H:i:s')?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Durasi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="datetime-local" id="text-input" name="durasi" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea class="ckeditor" name="deskripsi" id="deskripsi" rows="9"
                                            class="form-control"><?= $tugas['deskripsi']; ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col col-md-3">
                                        <label for="file" class=" form-control-label">Upload tugas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file" name="file" value="<?= $tugas['file']; ?>"
                                            class="form-control">
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <a href="/guru/listtugas/<?=$idkelas['id_kelas']?>/<?= $mapel['id_mapel']?>"
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