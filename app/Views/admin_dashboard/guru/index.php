<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-4">Guru</h1>
            <a href="/guruadmin/create" class="btn btn-primary mb-4">Tambah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-6">
                    <form action="" method="POST" autocomplete="off">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan nama pencarian" name="keyword"
                                autofocus>
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
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Guru MAPEL</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($guruadmin as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row["id_nip"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["gurumapel"]; ?></td>
                        <td>
                            <a href="/guruadmin/ubah/<?= $row['id_guru']; ?>" class="btn btn-success"
                                data-bs-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="/guruadmin/delete/<?= $row['id_guru']; ?>" method="POST" class="d-inline" v
                                onclick="return confirm('Apakah anda yakin?');">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" title="Hapus"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Input Pagination -->
<div class="container">
    <?= $pager->links('guruadmin', 'pagination'); ?>
</div>
<?= $this->include('admin_dashboard/footer'); ?>