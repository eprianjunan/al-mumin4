<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section id="profil">
    <!-- Awal Visi Misi -->
    <section id="visimisi">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="fw-bold">Visi & Misi</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <h3>Visi</h3>
                    <hr class="visimisi">
                    <p>
                        <?= $visimisi['visi']; ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <h3>Misi</h3>
                    <hr class="visimisi">
                    <p class="text-start">
                        <?= $visimisi['misi']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Visi Misi -->

    <!-- Kepala Sekolah -->
    <section id="kepsek">
        <div class="container mb-4">
            <div class="row">
                <div class="col">
                    <h2 class="fw-bold">Kepala Sekolah</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-8 text-start">
                    <p><?= $kepalasekolah['deskripsi']; ?></p>
                </div>
                <div class="col-md-4">
                    <img src="/image/<?= $kepalasekolah['gambar']; ?>" width="200" height="250">
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Kepala Sekolah -->

    <!-- Guru -->
    <section id="guru">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="fw-bold">Guru</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Mata Pelajaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($guru as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['gurumapel']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Tenaga Administrasi -->
    <section id="tenadm">
        <div class="container mb-3">
            <div class="row">
                <div class="col">
                    <h2 class="fw-bold">Tenaga Administrasi</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Bagian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($tenadm as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['bagian']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir tenaga administrasi -->
</section>
<?= $this->endSection(); ?>