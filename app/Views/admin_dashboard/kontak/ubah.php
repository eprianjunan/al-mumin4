<?= $this->include('admin_dashboard/sidebar'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <h2>Form Ubah Kontak</h2>
            <form action="/kontak/update/<?= $kontak['id_kontak']; ?>" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_kontak" value="<?= $kontak['id_kontak']; ?>">
                <div class="mb-3">
                    <label for="notelp" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $kontak['notelp']; ?>"
                        autofocus>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $kontak['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label><br>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $kontak['lokasi']; ?>">
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Ubah</button>
            </form>
        </div>
    </div>
</div>
</div>