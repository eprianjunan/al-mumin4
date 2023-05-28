<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="">Guru</h1>
            <a href="/guru/create" class="btn btn-primary mb-4">Tambah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-6">
                    <form action="" method="POST" autocomplete="off">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan keyword pencarian"
                                name="keyword" autofocus autocomplete="off">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"
                                name="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Username</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($guru as $row) {?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row["nama_guru"]; ?></td>
                        <td><?= $row["nip"]; ?></td>
                        <td><?= $row["nama_mapel"]; ?></td>
                        <td><?= $row["username"]; ?></td>

                        <?php if(date('Y-m-d H:i:s') <= $row["deadline_at"] && date('Y-m-d H:i:s') >= $row["created_at"]) { ?>
                        <td>
                            <a href="/guru/ubah/<?= $row['pengajar_id'];?>" class="btn btn-success disabled"
                                data-bs-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i>
                                <a href="/guru/ubahDefault/<?= $row['pengajar_id'];?>"
                                    class="btn btn-secondary btn-sm ">Reset Akun</a>
                                <a href="/guru/ubahDefault/<?= $row['pengajar_id'];?>" class="btn btn-danger disabled"
                                    data-bs-toggle="tooltip" title="Hapus"><i class=" fas fa-trash"></i></a>
                        </td>
                        <?php } else { ?>
                        <td>
                            <a href="/guru/ubah/<?= $row['pengajar_id'];?>" class="btn btn-success"
                                data-bs-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i>
                                <a href="/guru/ubahDefault/<?= $row['pengajar_id'];?>"
                                    class="btn btn-secondary btn-sm">Reset Akun</a>
                                <form action="/guru/delete/<?= $row['guru_id']; ?>" method="POST" class="d-inline"
                                    onclick="return confirm('Apakah anda yakin?');">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                        title="Hapus"><i class=" fas fa-trash"></i></button>
                                </form>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Input Pagination -->
<div class="container">
    <?= $pager->links('guru', 'pagination'); ?>
</div>
<?= $this->include('admin_dashboard/footer'); ?>