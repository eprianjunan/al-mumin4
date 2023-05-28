<?= $this->include('siswa/sidebar1'); ?>
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
            <a href="/siswa/tugas" class="btn btn-primary" data-bs-toggle="tooltip" title="Kembali"><i
                    class="fas fa-arrow-left"></i></a>
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 mb-35">Tugas Kelas <?=$idkelas['nama_kelas']?> 
                    <br> Mata Pelajaran
                        <?=$mapel['nama_mapel']?></h3>

                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Posting</th>
                                    <th>Durasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tugas as $row) { ?>
                                <tr class="tr-shadow">
                                    <td scope="row"><?= $i++; ?></td>
                                    <td>
                                        <?= $row['judul'] ?>
                                    </td>
                                    <td class="desc"><?= $row['deskripsi'] ?></td>
                                    <td class="desc"><?= $row["tgl_buat"]; ?></td>
                                    <td class="desc"><?= $row["durasi"]; ?></td>
                                    <td>
                                        <a href="<?= base_url('siswa/detailTugas/'). "/" .$row['id_tugas']. "/" .$mapelid['mapel_id']. "/". $idkelas['id_kelas'] ?>"
                                            class="btn btn-primary mb-4">Tambah Tugas</a>
                                    </td>
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
<?= $this->include('siswa/footer'); ?>