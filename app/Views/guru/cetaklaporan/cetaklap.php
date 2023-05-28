<?= $this->include('guru/sidebar'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Tugas Kelas</h3>
                <div class="mx-auto d-block">
                    <div class="container-fluid">
                        <?php foreach ($kelas as $row) { ?>
                        <div class="card card-body">
                            <h5><?=$row['nama_kelas']?></h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <?php foreach ($mapel as $k) {
                                             if ($row['id_kelas'] == $k['kelas_id']){
                                     ?>
                                        <tr>
                                            <td width="80%"><?=$k['nama_mapel']?></td>
                                            <?php if ($k['mapel_id'] == $guru['mapel_id']) { ?>
                                            <td><a href="<?=base_url()?>/guru/listtugas/<?=$k['kelas_id']?>/<?= $k['mapel_id']?>"
                                                    class="btn btn-success">Tugas</a></td>
                                            <?php }else{?>
                                            <td></td>
                                            <?php }?>
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