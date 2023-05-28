<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-4">Kepala Sekolah</h1>
            <a href="/kepalasekolah/ubah" class="btn btn-success mb-3">Ubah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kepalasekolah as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img src="/image/<?= $row["gambar"]; ?>" class="gambar" width="200" height="200"></td>
                        <td><?= $row["deskripsi"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->include('admin_dashboard/footer'); ?>