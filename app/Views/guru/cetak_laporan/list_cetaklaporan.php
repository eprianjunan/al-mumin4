<?= $this->include('guru/sidebar'); ?>
<style>
    thead {
        background-color: #04AA6D;
        color: white;
        padding: 15px;
        border-radius: 12px;
        text-align: center;
        }
    td {
    text-align: center;
        padding: 8px;
    }
    tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<?php 
use App\Models\HasilTugas_Model;
$nilais         = new HasilTugas_Model();
$nilai_tugas         = $nilais->nilai();
?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 mb-35">Cetak Laporan Kelas <?=$idkelas['nama_kelas']?></h3>
                    <div class="table-data__tool">

                        <div class="table-data__tool-right">
                            <a href="<?=base_url()?>/guru/hasil_cetaklaporan/<?=$idkelas['id_kelas']?>/<?= $mapelid['id_mapel']?>"
                                class="btn btn-primary mb-4">Cetak</a>
                        </div>
                    </div>
                    <div style="overflow-x:auto;" class=" table-responsive table-responsive-data2">
                        <table class="table table-bordered" align=center>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                   <th>Nilai Akhir Tugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $q = 1; ?>
                                <?php foreach ($laporan as $row) { ?>
                                <tr class="tr-shadow">
                                    <td scope="row"><?= $q++; ?></td>
                                    <td>
                                        <?= $row['nama_siswa'] ?>
                                    </td>
                                    <td class="desc"><?= $row['nis'] ?></td>
                                    <?php  $jmlh = 0; 
                                    foreach ($nilai as $i) {?>
                                        
                                            <?php 
                                        if(($row['id_siswa'] == $i['siswa_id']) && ($row['mapel_id']==$i['mapel_id'])&& ($row['kelas_id']==$i['kelas_id'])){?>
                                        <?php $jmlh = $jmlh+$i['nilai'];
                                      } }
                                      $total=$jmlh/$tugas;?>
                                  <td class="desc">  <?php echo $total ?></td>
                                </tr>
                                <tr class="spacer"></tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>