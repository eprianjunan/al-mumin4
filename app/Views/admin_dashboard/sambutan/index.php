<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-4">Sambutan</h1>
            <a href="/sambutan/ubah" class="btn btn-success mb-3">Ubah Data</a>
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
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sambutan as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row["judul"]; ?></td>
                        <td><img src="/image/<?= $row["gambar"]; ?>" class="gambar" width="100"></td>
                        <td><?= $row["deskripsi"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->include('admin_dashboard/footer'); ?>