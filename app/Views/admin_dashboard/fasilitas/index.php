<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-4">Fasilitas</h1>
            <a href="/fasilitas/create" class="btn btn-primary mb-4">Tambah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($fasilitas as $row) {?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row["judul_fasilitas"]; ?></td>
                        <td><img src="/image/fasilitas/<?= $row["gambar"]; ?>" class="gambar" width="100" height="100">
                        </td>
                        <td class="col-4"><?= $row["deskripsi"]; ?></td>
                        <td>
                            <a href="/fasilitas/ubah/<?= $row['id_fasilitas']; ?>" class="btn btn-success"
                                data-bs-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="/fasilitas/delete/<?= $row['id_fasilitas']; ?>" method="POST" class="d-inline"
                                onclick="return confirm('Apakah anda yakin?');">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" title="Hapus"><i
                                        class=" fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->include('admin_dashboard/footer'); ?>