<?= $this->include('siswa/sidebar1'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-11">
                    <h3 class="title-5 m-b-35">Materi Kelas <?=$kelas['nama_kelas']?> </h3>
                    <?php foreach ($materi as $i) {?>
                    <div class="card">
                        <div class="card-header">
                            <strong><?=$i['nama_mapel']?></strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>
                                            Materi</strong></label>
                                </div>
                                <div class="col col-md-3">
                                    <label for="text-input"
                                        class=" form-control-label"><strong><?= $i['judul'] ?></strong></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>Nama
                                            Guru</strong></label>
                                </div>
                                <div class="col col-md-3">
                                    <label for="textarea-input"
                                        class=" form-control-label"><u><?= $i['nama_guru']?></u></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><strong>Tanggal Di
                                            Upload</strong></label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="textarea-input"
                                        class=" form-control-label"><?= $i['tgl_posting']?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-7">
                                    <label for="text-input" class=" form-control-label"><strong>Catatan</strong></label>
                                </div>
                                <div class="col col-md-7">
                                    <p><?php echo $i['deskripsi']?></p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <a href="<?= base_url() ."/assets/materi/" .$i["files"]; ?>" target="__blank"><i
                                        class="fas fa-file-download"></i>   <?= $i['files']?></a>
                    
                            </div>
                            <div class="row form-group">
                                
                                <a href="<?= base_url() ."/assets/materi/" .$i["files1"]; ?>" target="__blank"><i
                                        class="fas fa-file-download"></i>   <?= $i['files1']?></a>
                                
                            </div>
                            <div class="row form-group">
                                <a href="<?= base_url() ."/assets/materi/" .$i["files2"]; ?>" target="__blank"><i
                                        class="fas fa-file-download"></i>   <?= $i['files2']?></a>
                            </div>
                            <div class="card-footer">
                                <a href="/siswa/listmateri/<?=$kelas['id_kelas']?>/<?= $i['mapel_id']?>"
                                    class="btn btn-primary btn-sm" class="fa fa-ban" role="button">Back</a>
                            </div>

                        </div>
                    </div>
                </div>
                </form>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
<?= $this->include('siswa/footer'); ?>