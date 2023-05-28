<?= $this->include('guru/sidebar'); ?>
<!-- Main Content -->
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
<div class="container-fluid">
    <div class="row">
        <div class="col-md mb-5">
            <h2 class="text-center">Laporan Nilai Akhir Tugas Siswa</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <p>Kelas : <?= $idkelas["nama_kelas"]; ?></p>
            <p>Mata Pelajaran : <?= $mapelid["nama_mapel"]; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
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
        </div>
    </div>
</div>
<script language="javascript">
window.print();
</script>
<?= $this->include('guru/footer'); ?>