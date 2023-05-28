<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-4">Kontak</h1>
            <a href="/kontak/ubah" class="btn btn-success mb-3">Ubah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No. Handphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kontak as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row["notelp"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["lokasi"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->include('admin_dashboard/footer'); ?>