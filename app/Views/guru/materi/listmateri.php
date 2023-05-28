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
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 mt-4">Materi Kelas <?=$idkelas['nama_kelas']?></h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <a href="<?= base_url();?>/guru/materi" class="btn btn-primary mb-4"
                                data-bs-toggle="tooltip" title="Kembali"><i class="fas fa-arrow-left"></i></a>
                            <a href="<?=base_url()?>/guru/createMateri/<?=$idkelas['id_kelas']?>/<?= $mapelid['mapel_id']?>"
                                class="btn btn-primary mb-4">Tambah Materi</a>
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
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
                                    <td class="desc"><?= substr($row['deskripsi'], 0, 10) ?>....</td>
                                    <td class="desc">
                                        <?php if($row['files']!=null && $row['files1']==null && ($row['files2'])==null) {?>
                                        <a href="<?= base_url() ."/assets/materi/" .$row["files"]; ?>"
                                            target="__blank"><i class="fas fa-file-download"></i> File 1</a>
                                        <?php }elseif($row['files']!=null && $row['files1']!=null && $row['files2']==null){?>
                                        <a href="<?= base_url() ."/assets/materi/" .$row["files"]; ?>"
                                            target="__blank"><i class="fas fa-file-download"></i> File 1</a>
                                        <a href="<?= base_url() ."/assets/materi/" .$row["files1"]; ?>"
                                            target="__blank"><i class="fas fa-file-download"></i> File 2</a>
                                        <?php }else{ ?>
                                        <a href="<?= base_url() ."/assets/materi/" .$row["files"]; ?>"
                                            target="__blank"><i class="fas fa-file-download"></i> File 1</a>
                                        <a href="<?= base_url() ."/assets/materi/" .$row["files1"]; ?>"
                                            target="__blank"><i class="fas fa-file-download"></i> File 2</a> 
                                        <a href="<?= base_url() ."/assets/materi/" .$row["files2"]; ?>"
                                            target="__blank"><i class="fas fa-file-download"></i> File 3</a>
                                            <?php } ?>
                                    </td>
                                    <td class="desc"><?= $row["tgl_posting"]; ?></td>
                                    <td>
                                        <a href="<?=base_url()?>/guru/ubahMateri/<?=$row['id_materi']?>"
                                            class="btn btn-success" data-bs-toggle="tooltip" title="Edit"><i
                                                class="far fa-edit"></i></a>
                                        <form
                                            action="<?= base_url('guru/deleteMateri/'. $row['id_materi']. '/' . $idkelas['id_kelas']. '/' . $mapelid['mapel_id']) ?>"
                                            method="POST" class="d-inline"
                                            onclick="return confirm('Apakah anda yakin?');">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                                title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                        </form>
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
<?= $this->include('guru/footer'); ?>