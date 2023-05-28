<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-4">Mata Pelajaran</h1>
            <a href="/admin/vtambahmapel" class="btn btn-primary mb-4">Tambah Mapel</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mapel as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td class="col-md-8"><?= $row["nama_mapel"]; ?></td>
                        <td>
                            <form action="/admin/delete/<?= $row['id_mapel']; ?>" method="POST" class="d-inline"
                                onclick="return confirm('Apakah anda yakin?');">
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