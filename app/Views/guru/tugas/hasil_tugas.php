<?= $this->include('guru/sidebar'); ?>
<!-- MAIN CONTENT-->
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
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="/guru/listtugas/<?=$idkelas['id_kelas']?>/<?= $mapelid['mapel_id']?>"
                class="btn btn-primary btn-sm" class="fa fa-ban" role="button">Back</a>
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 mb-35"> Hasil Tugas Kelas <?=$idkelas['nama_kelas']?></h3>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nama File</th>
                                    <th>Tanggal Dikumpulkan</th>
                                    <th>Nilai</th>
                                    <th></th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($hasil as $row) { 
                                    if($row['tgl_pengumpulan'] >= $tugas['durasi']){?>

                                <tr class="tr-shadow">
                                    <td scope="row"><?= $i++; ?></td>
                                    <td>
                                        <?= $row['nama_siswa'] ?>
                                    </td>
                                    <td class="desc"><?= $row['nama_mapel'] ?></td>
                                    <td class="desc"><a
                                            href="<?= base_url() ."/assets/hasiltugas/" .$row["nama_file"]; ?>"
                                            download><?php echo $row["nama_file"]?></a></td>
                                    <td class="desc"><?= $row["tgl_pengumpulan"]; ?></td>
                                    <td class="desc"><?= $row["nilai"]; ?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <?php if($row["deadline_at"]==null) { ?>
                                            <form method="post"
                                                action="<?= base_url('guru/updateNilai/'.$row['id_hasiltugas'].'/'.$row['tugas_id'].'/'.$row['kelas_id'].'/'.$row['mapel_id'])?>">
                                                <?php csrf_field() ?>
                                                <input type="hidden" name="deadline_at"
                                                    value="<?= date('Y-m-d H:i:s', time()+60*60*24*14)?>">
                                                <div class="row form-group">
                                                    <div class="col-4">
                                                        <input type="number" class="form-control" name="nilai">
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="submit" value="Submit"
                                                            class="btn btn-secondary btn-sm">
                                                    </div>
                                                </div>
                                            </form>
                                            <?php }elseif(date('Y-m-d H:i:s') >= $row["deadline_at"]) { ?>
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    <input type="number" class="form-control disabled" name="nilai">
                                                </div>
                                                <div class="col-3">
                                                    <input type="submit" value="Submit"
                                                        class="btn btn-secondary disabled">
                                                </div>
                                            </div>
                                            <?php }elseif($row["deadline_at"]==!null) { ?>
                                            <form method="post"
                                                action="<?= base_url('guru/updateNilai/'.$row['id_hasiltugas'].'/'.$row['tugas_id'].'/'.$row['kelas_id'].'/'.$row['mapel_id'])?>">
                                                <?php csrf_field() ?>
                                                <input type="hidden" name="deadline_at"
                                                    value="<?=$row['deadline_at']?>">
                                                <div class="row form-group">
                                                    <div class="col-4">
                                                        <input type="number" class="form-control" name="nilai">
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="submit" value="Submit"
                                                            class="btn btn-secondary btn-sm">
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                        <?php } else { ?>
                                        <form method="post"
                                            action="<?= base_url('guru/updateNilai/'.$row['id_hasiltugas'].'/'.$row['tugas_id'].'/'.$row['kelas_id'].'/'.$row['mapel_id'])?>">
                                            <?php csrf_field() ?>
                                            <input type="hidden" name="deadline_at"
                                                value="<?= date('Y-m-d H:i:s', time()+60*60*24*14)?>">
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    <input type="number" class="form-control" name="nilai">
                                                </div>
                                                <div class="col-3">
                                                    <input type="submit" value="Submit"
                                                        class="btn btn-secondary btn-sm">
                                                </div>
                                            </div>
                                        </form>
                                        <?php } ?>
                    </div>
                    </td>
                    <td class="desc">Terlambat Mengumpulkan</td>
                    </tr>
                    <?php }else{ ?>
                    <tr class="tr-shadow">
                        <td scope="row"><?= $i++; ?></td>
                        <td>
                            <?= $row['nama_siswa'] ?>
                        </td>
                        <td class="desc"><?= $row['nama_mapel'] ?></td>
                        <td class="desc"><a href="<?= base_url() ."/assets/hasiltugas/" .$row["nama_file"]; ?>"
                                download><?php echo $row["nama_file"]?></a></td>
                        <td class="desc"><?= $row["tgl_pengumpulan"]; ?></td>
                        <td class="desc"><?= $row["nilai"]; ?></td>
                        <td>
                            <div class="table-data-feature">
                                <?php if($row["deadline_at"]==null) { ?>
                                <form method="post"
                                    action="<?= base_url('guru/updateNilai/'.$row['id_hasiltugas'].'/'.$row['tugas_id'].'/'.$row['kelas_id'].'/'.$row['mapel_id'])?>">
                                    <?php csrf_field() ?>
                                    <input type="hidden" name="deadline_at"
                                        value="<?= date('Y-m-d H:i:s', time()+60*60*24*14)?>">
                                    <div class="row form-group">
                                        <div class="col-4">
                                            <input type="number" class="form-control" name="nilai">
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" value="Submit" class="btn btn-secondary btn-sm">
                                        </div>
                                    </div>
                                </form>
                                <?php }elseif(date('Y-m-d H:i:s') >= $row["deadline_at"]) { ?>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <input type="number" class="form-control disabled" name="nilai">
                                    </div>
                                    <div class="col-3">
                                        <input type="submit" value="Submit" class="btn btn-secondary disabled">
                                    </div>
                                </div>
                                <?php }elseif($row["deadline_at"]==!null) { ?>
                                <form method="post"
                                    action="<?= base_url('guru/updateNilai/'.$row['id_hasiltugas'].'/'.$row['tugas_id'].'/'.$row['kelas_id'].'/'.$row['mapel_id'])?>">
                                    <?php csrf_field() ?>
                                    <input type="hidden" name="deadline_at" value="<?=$row['deadline_at']?>">
                                    <div class="row form-group">
                                        <div class="col-4">
                                            <input type="number" class="form-control" name="nilai">
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" value="Submit" class="btn btn-secondary btn-sm">
                                        </div>
                                    </div>
                            </div>
                            </form>
                            <?php } else { ?>
                            <form method="post"
                                action="<?= base_url('guru/updateNilai/'.$row['id_hasiltugas'].'/'.$row['tugas_id'].'/'.$row['kelas_id'].'/'.$row['mapel_id'])?>">
                                <?php csrf_field() ?>
                                <input type="hidden" name="deadline_at"
                                    value="<?= date('Y-m-d H:i:s', time()+60*60*24*14)?>">
                                <div class="row form-group">
                                    <div class="col-4">
                                        <input type="number" class="form-control" name="nilai">
                                    </div>
                                    <div class="col-3">
                                        <input type="submit" value="Submit" class="btn btn-secondary btn-sm">
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                </div>
                </td>
                <td class="desc">Tepat Waktu</td>
                </tr>
                <?php } } ?>
                <tr class="spacer"></tr>

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
<?= $this->include('guru/footer'); ?>