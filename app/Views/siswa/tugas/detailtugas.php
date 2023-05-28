<?= $this->include('siswa/sidebar1'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="title-5 m-b-35">TUGAS SISWA</h3>

                    <?php foreach ($tugas as $i) {?>
                    <form action="<?= base_url('siswa/detailTugas/')?>" method="post" enctype="multipart/form-data"
                        class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <strong>TUGAS <?= $i['judul'] ?></strong>
                            </div>

                            <div class="card-body card-block">
                                <div class="row form-group">
                                <div class="col col-md-3">
                                    <b>Tanggal Posting</b>
                                </div>
                                    <div class="col-12 col-md-6">   
                                        <label for="textarea-input" class=" form-control-label">
                                            <?= $i['tgl_buat']?></label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                <div class="col col-md-3">
                                <b>Tanggal Pengumpulan</b>
                                </div>
                                    <div class="col-12 col-md-6">
                                        <label for="textarea-input" class=" form-control-label">
                                            <?= $i['durasi']?></label>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-7">
                                    <b>Keterangan</b>
                                        <p><?php echo $i['deskripsi']?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-7">
                                        <a href=<?= base_url() ."/assets/tugas/" .$i["file"]; ?> height="700"
                                            width="750" title="Iframe Example" target="__blank"><i
                                        class="fas fa-file-download"></i>   <?= $i["file"]; ?></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                </form>
                <?php }?>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">
                            <strong class="mx-auto d-block">Nilai</strong>
                        </div>
                        <div class="card-body mx-auto d-block">
                            <h1><?php if (!empty($hasiltugas)) {
                                                echo $hasiltugas['nilai'];
                                            }else{
                                                echo 0;
                                            } ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">

                    <?php if(empty($hasiltugas)) { ?>
                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert-danger">
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                    <?php endif; ?>

                    <form
                        action="<?= base_url()?>/siswa/uploadTugas/<?= $i['id_tugas']. "/" .$mapelid['mapel_id']. "/" .$idkelas['id_kelas'] ?>"
                        method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <strong>Upload tugas</strong>
                            </div>
                            <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
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
                                <div class="mb-3">
                                    <div class="col col-md-3">
                                        <label for="files" class=" form-control-label">Upload Tugas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="files" name="files" class="form-control">
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" name="akun" value="<?= $akun; ?>">
                                        <input type="hidden" name="id_kelas" value="<?= $idkelas['id_kelas']; ?>">
                                        <input type="hidden" name="mapel_id" value="<?= $mapelid['mapel_id']; ?>">
                                        <input type="hidden" name="id_tugas" value="<?= $i['id_tugas']; ?>">
                                        <input type="hidden" name="pengajar_id" value="<?= $i['pengajar_id']; ?>">
                                        <input type="hidden" name="tgl_pengumpulan" value="<?= date('Y-m-d H:i:s')?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <a href="/siswa/listtugas/<?=$idkelas['id_kelas']?>/<?= $mapelid['mapel_id']?>"
                                    class="btn btn-primary btn-sm" class="fa fa-ban" role="button">Back</a>
                            </div>
                        </div>
                    </form>
                    <?php } else { 
                         if(date('Y-m-d H:i:s') <= $hasiltugas["tgl_pengumpulan"]){
                            ?>
                    <form action="<?= base_url()?>/siswa/deleteTugas/<?= $hasiltugas['id_hasiltugas'] ?>" method="post"
                        enctype="multipart/form-data" class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <strong>Upload tugas</strong>
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
                                <div class="col col-md-3">
                                    <strong color="red">Terlambat Dikumpulkan</strong>
                                </div>
                                <div class="mb-3">
                                    <div class="col col-md-3">
                                        <label for="files" class=" form-control-label">Upload Tugas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="files" name="files" class="form-control"
                                            value="<?= $hasiltugas['nama_file']; ?>" readonly>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" name="akun" value="<?= $akun; ?>">
                                        <input type="hidden" name="id_kelas" value="<?= $idkelas['id_kelas']; ?>">
                                        <input type="hidden" name="mapel_id" value="<?= $mapelid['mapel_id']; ?>">
                                        <input type="hidden" name="id_tugas" value="<?= $i['id_tugas']; ?>">
                                        <input type="hidden" name="pengajar_id" value="<?= $i['pengajar_id']; ?>">
                                        <input type="hidden" name="hasiltugas"
                                            value="<?= $hasiltugas['id_hasiltugas']; ?>">
                                        <input type="hidden" name="tgl_pengumpulan" value="<?= date('Y-m-d H:i:s')?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php if ($hasiltugas['nilai']==null){ ?>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Hapus
                                </button>
                                <?php }else{} ?>
                                <a href="/siswa/listtugas/<?=$idkelas['id_kelas']?>/<?= $mapelid['mapel_id']?>"
                                    class="btn btn-primary btn-sm" class="fa fa-ban" role="button">Back</a>
                            </div>
                        </div>
                    </form>
                    <?php }else{ ?>
                    <form action="<?= base_url()?>/siswa/deleteTugas/<?= $hasiltugas['id_hasiltugas'] ?>" method="post"
                        enctype="multipart/form-data" class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <strong>Upload tugas</strong>
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
                                <div class="mb-3">
                                    <div class="col col-md-3">
                                        <label for="files" class=" form-control-label">Upload Tugas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="files" name="files" class="form-control"
                                            value="<?= $hasiltugas['nama_file']; ?>" readonly>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" name="akun" value="<?= $akun; ?>">
                                        <input type="hidden" name="id_kelas" value="<?= $idkelas['id_kelas']; ?>">
                                        <input type="hidden" name="mapel_id" value="<?= $mapelid['mapel_id']; ?>">
                                        <input type="hidden" name="id_tugas" value="<?= $i['id_tugas']; ?>">

                                        <input type="hidden" name="hasiltugas"
                                            value="<?= $hasiltugas['id_hasiltugas']; ?>">
                                        <input type="hidden" name="tgl_pengumpulan" value="<?= date('Y-m-d H:i:s')?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php if ($hasiltugas['nilai']==null){ ?>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Hapus
                                </button>
                                <?php }else{} ?>
                                <a href="/siswa/listtugas/<?=$idkelas['id_kelas']?>/<?= $mapelid['mapel_id']?>"
                                    class="btn btn-primary btn-sm" class="fa fa-ban" role="button">Back</a>
                            </div>
                        </div>
                    </form>
                    <?php }; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>
</div>
<?= $this->include('siswa/footer'); ?>