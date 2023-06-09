<?= $this->include('guru/sidebar'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <form action="<?= base_url('guru/saveTugas/'. $idkelas['id_kelas']. '/' . $mapelid['id_mapel']); ?>"
                        method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?= csrf_field(); ?>
                        <div class="card">
                            <div class="card-header">
                                <strong>Tambah Tugas</strong>
                            </div>
                            <?php if (session()->getFlashdata('tidaklengkap')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('tidaklengkap'); ?>
                            </div>
                            <?php endif; ?>
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
                                        <small class="form-text text-muted">Tulislah Judul pengumuman yang sesuai dengan
                                            Tugas</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Kelas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" readonly
                                            value="<?= $idkelas['nama_kelas'] ?>" name="kelas" placeholder="Judul"
                                            class="form-control">
                                        <input type="hidden" id="text-input" value="<?= $idkelas['id_kelas'] ?>"
                                            name="idkelas" placeholder="Judul" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Mata Pelajaran</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" readonly
                                            value="<?= $mapelid['nama_mapel'] ?>" name="mapel" placeholder="Judul"
                                            class="form-control">
                                        <input type="hidden" id="text-input" value="<?= $mapelid['id_mapel'] ?>"
                                            name="idmapel" placeholder="Judul" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="idguru" value="<?= $guru ?>">
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
                                        <label for="textarea-input" class="form-control-label">Deskripsi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea class="ckeditor" name="deskripsi" id="deskripsi" rows="9"
                                            placeholder="Isi Deskripsi..." class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col col-md-3">
                                        <label for="file" class=" form-control-label">Upload Tugas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file" name="file" class="form-control">
                                        <?php if (session()->getFlashdata('gagal')) : ?>
                                        <div class="alert-danger">
                                            <?= session()->getFlashdata('gagal'); ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <a href="/guru/listtugas/<?=$idkelas['id_kelas']?>/<?= $mapelid['id_mapel']?>"
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