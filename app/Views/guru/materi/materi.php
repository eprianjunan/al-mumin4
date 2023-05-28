<?= $this->include('guru/sidebar'); ?>
<style>
    td {
    font-size: 18px;
        padding: 8px;
    }
</style>
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
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Materi Kelas</h3>
                <div class="mx-auto d-block">
                    <div class="container-fluid">
                        <?php foreach ($kelas as $row) { ?>
                        <div class="card card-body">
                            <h4><?=$row['nama_kelas']?></h4>
                            <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <?php foreach ($mapel as $k) {
                                             if ($row['id_kelas'] == $k['kelas_id']&&$k['mapel_id'] == $guru['mapel_id']){
                                     ?>
                                        <tr>
                                            <td width="100%"><?=$k['nama_mapel']?></td>
                                            <?php if ($k['mapel_id'] == $guru['mapel_id']) { ?>
                                            <td><a href="<?=base_url()?>/guru/listMateri/<?=$k['kelas_id']?>/<?= $k['mapel_id']?>"
                                                    class="btn btn-success">Materi</a></td>
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
<?= $this->include('guru/footer'); ?>