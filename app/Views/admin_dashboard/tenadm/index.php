<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-4">Tenaga Administrasi</h1>
            <a href="/tenagaadministrasi/create" class="btn btn-primary mb-4">Tambah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Bagian/Divisi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tenagaadministrasi as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["bagian"]; ?></td>
                        <td>
                            <a href="/tenagaadministrasi/ubah/<?= $row['id_tenagaadministrasi']; ?>"
                                class="btn btn-success" data-bs-toggle="tooltip" title="Edit"><i
                                    class="fas fa-edit"></i>
                            </a>
                            <form action="/tenagaadministrasi/delete/<?= $row['id_tenagaadministrasi']; ?>"
                                method="POST" class="d-inline" onclick="return confirm('Apakah anda yakin?');">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" title="Hapus"><i
                                        class=" fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->include('admin_dashboard/footer'); ?>