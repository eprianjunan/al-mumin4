<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="">Siswa</h1>
            <a href="/siswa/create" class="btn btn-primary mb-4">Tambah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="POST" autocomplete="off">
                        <?= csrf_field(); ?>
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
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Username</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($siswa as $row) {?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row["nama_siswa"]; ?></td>
                        <td><?= $row["nis"]; ?></td>
                        <td><?= $row["nama_kelas"]; ?></td>
                        <td><?= $row["username"]; ?></td>

                        <?php if(date('Y-m-d H:i:s') <= $row["deadline_at"] && date('Y-m-d H:i:s') >= $row["created_at"]) { ?>
                        <td>
                            <a href="/siswa/ubah/<?= $row['id_siswa']; ?>" class="btn btn-success disabled"
                                data-bs-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i>
                                <a href="/siswa/ubahDefault/<?= $row['siswa_id'];?>"
                                    class="btn btn-secondary btn-sm">Reset
                                    Akun</a>
                                <a href="/siswa/delete/<?= $row['id_siswa']; ?>" class="btn btn-danger disabled"
                                    data-bs-toggle="tooltip" title="Hapus"><i class=" fas fa-trash"></i></a>
                        </td>
                        <?php } else { ?>
                        <td>
                            <a href="/siswa/ubah/<?= $row['id_siswa']; ?>" class="btn btn-success"
                                data-bs-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="/siswa/ubahDefault/<?= $row['siswa_id'];?>" class="btn btn-secondary btn-sm">Reset
                                Akun</a>
                            <form action="/siswa/delete/<?= $row['id_siswa']; ?>" method="POST" class="d-inline"
                                onclick="return confirm('Apakah anda yakin?');">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" title="Hapus"><i
                                        class=" fas fa-trash"></i></button>
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
    <?= $pager->links('siswa', 'pagination'); ?>
</div>
<?= $this->include('admin_dashboard/footer'); ?>