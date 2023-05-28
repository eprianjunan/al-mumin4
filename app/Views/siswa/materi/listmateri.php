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
            <a href="/siswa/materi" class="btn btn-primary" data-bs-toggle="tooltip" title="Kembali"><i
                    class="fas fa-arrow-left"></i></a>
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 mb-35">Materi Kelas <?=$idkelas['nama_kelas']?><br> Mata Pelajaran
                        <?=$mapel['nama_mapel']?></h3>

                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Posting</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($materi as $row) { ?>
                                <tr class="tr-shadow">
                                    <td scope="row"><?= $i++; ?></td>
                                    <td>
                                        <?= $row['judul'] ?>
                                    </td>
                                    <td class="desc"><?= substr($row['deskripsi'], 0, 10) ?>...</td>
                                    <td class="desc"><?= $row["tgl_posting"]; ?></td>
                                    <td>
                                        <a href="<?= base_url('siswa/detailmateri/'). "/" .$row['id_materi']. "/" .$row['mapel_id']. "/". $row['kelas_id'] ?>"
                                            class="btn btn-primary mb-4">Lihat Materi</a>
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