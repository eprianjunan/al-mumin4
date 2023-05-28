<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section id="ppdb">
    <div class="row">
        <div class="col-md">
            <img src="/image/ppdb.png" alt="" width="1266" height="200">
        </div>
    </div>

    <div class="container-fluid">
        <div class="row text-center pt-3">
            <div class="col">
                <h2>Selamat Datang di PPDB Yayasan Pendidikan Islam Al - Mu'min</h2>
                <hr class="mb-4 mt-2 d-inline-block mx-auto"
                    style="width: 65px; background-color: #0a7600; height: 5px">
                <p>Situs ini dibuat sebagai pusat informasi dan pengolahan seleksi data siswa peserta
                    PPDB Yayasan Pendidikan Islam Al - Mu'min secara online real time process untuk pelaksanaan PPDB
                    Online. Silahkan lakukan pengisian data diri pada bagian link gform yang tertera dibawah ini, isi
                    secara detail dan lengkap pastikan semua data yang diinputkan secara benar</p>
                <a href="https://forms.gle/TPufQZxuMgxBjTaHA">GOOGLE FORM</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>