<?= $this->extend('template/layout') ?>

<!-- Content section -->
<?= $this->section('content') ?>
<!-- Material Icons CDN -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('pelanggan/create') ?>" method="POST" class="no-validated row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kode Pelanggan</label>
                                <input type="text" class="form-control" name="kode_pelanggan" value="<?= $kode_pelanggan ?>" autocomplete="off" disabled>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pelanggan" autocomplete="off">
                                <?php if (isset($validation)): ?>
                                    <span class="badge bg-danger"> <?= $validation->getError('nama_pelanggan') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nomor Telepon Pelanggan</label>
                                <input type="number" class="form-control" name="no_telp_pelanggan" autocomplete="off" maxlength="13">
                                <?php if (isset($validation)): ?>
                                    <span class="badge bg-danger"> <?= $validation->getError('no_telp_pelanggan') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Email Pelanggan</label>
                                <input type="text" class="form-control" name="email_pelanggan" autocomplete="off">
                                <?php if (isset($validation)): ?>
                                    <span class="badge bg-danger"> <?= $validation->getError('email_pelanggan') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat Pelanggan</label>
                                <textarea type="text" class="form-control" name="alamat_pelanggan" rows="3" autocomplete="off"></textarea>
                                <?php if (isset($validation)): ?>
                                    <span class="badge bg-danger"> <?= $validation->getError('alamat_pelanggan') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Jenis Kelamin Pelanggan</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin_pelanggan" id="laki-laki" value="Laki-Laki" autocomplete="off">
                                    <label for="laki-laki" class="form-check-label">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin_pelanggan" id="perempuan" value="Perempuan" autocomplete="off">
                                    <label for="perempuan" class="form-check-label">Perempuan</label>
                                </div>
                                <?php if (isset($validation)): ?>
                                    <span class="badge bg-danger"> <?= $validation->getError('jenis_kelamin_pelanggan') ?></span>
                                <?php endif; ?>
                            </div>
                            <hr>
                            <div class="col-12 pt-2">
                                <a href="<?= base_url('pelanggan') ?>" class="btn btn-warning"> Batal</a>
                                <button type="submit" class="btn btn-primary"> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>