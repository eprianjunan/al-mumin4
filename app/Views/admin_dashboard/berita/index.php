<?= $this->include('admin_dashboard/sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-4">Berita</h1>
            <a href="/berita/create" class="btn btn-primary mb-4">Tambah Data</a>
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
                                name="keyword" autofocus>
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
                        <th scope="col">Judul</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($berita as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row["judul"]; ?></td>
                        <td><img src="/image/berita/<?= $row['gambar']; ?>" class="gambar" width="100" height="100">
                        </td>
                        <td class="col-4"><?= substr($row["deskripsi"], 0, 25) ?>...</td>
                        <td>
                            <form action="/berita/ubah/<?= $row['id_berita']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="UBAH">
                                <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" title="Edit"><i
                                        class="fas fa-edit"></i></button>
                            </form>
                            <form action="/berita/delete/<?= $row['id_berita']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" title="Hapus"
                                    onclick="return confirm('Apakah anda yakin')"><i class=" fas fa-trash"></i></button>
                            </form>
                            <a href="<?= base_url('/pages/beritaRead/'.$row['slug_berita']) ?>" class="btn btn-info"
                                target="__blank">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
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
    <?= $pager->links('berita', 'pagination'); ?>
</div>
<!-- script delete -->
<?= $this->include('admin_dashboard/footer'); ?>