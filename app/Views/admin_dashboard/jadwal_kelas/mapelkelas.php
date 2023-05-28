<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Mata Pelajaran Kelas</h3>
                <div class="mx-auto d-block">
                    <a href="<?=base_url()?>/admin/tambahmapelkelas" class="btn btn-success mb-2">Tambah Mata
                        Pelajaran</a>
                    <div class="container-fluid">
                        <?php foreach ($kelas as $row) { ?>
                        <div class="card card-body mb-3">
                            <h5><?=$row['nama_kelas']?></h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <?php foreach ($mapel as $k) {
                                             if ($row['id_kelas'] == $k['kelas_id']){
                                     ?>
                                        <tr>
                                            <td width="80%"><?=$k['nama_mapel']?></td>
                                            <td width="90%">
                                                <?php foreach ($guru as $u) { 
                                                    if($k['mapel_id'] == $u['mapel_id'] && $row['id_kelas']==$u['kelas_id']){ ?>
                                                <?= $u['nama_guru']; }else{ ?>
                                                <?php }} ?></td>
                                            <td>
                                                <form action="/admin/deletemapelkelas/<?= $k['id_mapelkelas']; ?>"
                                                    method="POST" class="d-inline"
                                                    onclick="return confirm('Apakah anda yakin?');">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"
                                                        data-bs-toggle="tooltip" title="Hapus"><i
                                                            class=" fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <br>
            </div>
            <!-- END MAP DATA-->
        </div>
    </div>

</div>
<?= $this->include('admin_dashboard/footer'); ?>