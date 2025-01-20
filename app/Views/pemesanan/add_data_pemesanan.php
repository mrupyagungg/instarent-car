<?= $this->extend('template/layout') ?>

<!-- Content section -->
<?= $this->section('content') ?>

<!-- Link Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEJpP3p5q7jD5k2f2lCZ5TO9p4a9z2emMZ4vh6dZQp+djlG1+OG0gd3cnSxd3" crossorigin="anonymous">

<!-- Link CSS tambahan jika diperlukan -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/detail.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">

<!-- Bootstrap JS Bundle (termasuk Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fqz1ccnxLx6i6L+UHpCqaYwFv9l5O8jPiVAPf8ow9tD3F" crossorigin="anonymous">
</script>
<style>
.breadcrumb-item+.breadcrumb-item::before {
    content: none;
}
</style>
<div class="home" id="home">

    <!-- Start page title -->
    <div class="breadcrumb">
        <div class="breadcrumb-item">
            <span>Registrasi</span>
        </div>
        <div class="breadcrumb-item active">
            <a href="<?= base_url('pemesanan/add_data_pemesanan') ?>"></a>
            <span>Pesan</span>
        </div>
        <div class="breadcrumb-item">
            <a href="<?= base_url('bayar') ?>">Bayar</a>
        </div>
    </div>
    <!-- End page title -->

    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="form-header">Data Anda</h4>

                <!-- Form Input Pelanggan -->
                <form action="/customer/store" method="post" id="pelangganForm">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                            value="<?= old('nama_pelanggan', session()->get('username')) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email_pelanggan">Email</label>
                        <input type="email" class="form-control" id="email_pelanggan" name="email_pelanggan"
                            value="<?= old('email_pelanggan', session()->get('email')) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp_pelanggan">No Telepon</label>
                        <input type="number" class="form-control" id="no_telp_pelanggan" name="no_telp_pelanggan"
                            value="<?= old('no_telp_pelanggan') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_pelanggan">Alamat</label>
                        <textarea class="form-control" id="alamat_pelanggan" name="alamat_pelanggan"
                            required><?= old('alamat_pelanggan') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin_pelanggan">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin_pelanggan" name="jenis_kelamin_pelanggan"
                            required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki"
                                <?= old('jenis_kelamin_pelanggan') === 'Laki-laki' ? 'selected' : '' ?>>
                                Laki-laki
                            </option>
                            <option value="Perempuan"
                                <?= old('jenis_kelamin_pelanggan') === 'Perempuan' ? 'selected' : '' ?>>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <?php if (!session()->getFlashdata('success')): ?>
                    <button type="submit"
                        class="btn btn-success btn-block rounded-pill shadow-sm d-flex align-items-center justify-content-center"
                        id="btnSimpan">
                        <span>Simpan Data</span>
                    </button>
                    <?php endif; ?>

                    <!-- Tombol Lanjut -->
                    <?php if (session()->getFlashdata('success')): ?>
                    <button id="btnLanjut" class="btn btn-primary btn-block rounded-pill">
                        <a href="/pemesanan/add_data_pemesanan">Lanjut</a>
                    </button>
                    <?php endif; ?>
                </form>
            </div>

            <div class="col">
                <form action="<?= base_url('pemesanan/create') ?>" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Kode Pemesanan</label>
                        <input type="text" class="form-control" name="kode_pemesanan" value="<?= $kode_pemesanan ?>"
                            autocomplete="off" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan"
                            autocomplete="off" required>
                        <?php if (isset($validation)): ?>
                        <div class="invalid-feedback"><?= $validation->getError('tanggal_pemesanan') ?></div>
                        <?php endif; ?>
                    </div>

                    <script>
                    var today = new Date().toISOString().split('T')[0];
                    document.getElementById('tanggal_pemesanan').setAttribute('min', today);
                    </script>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan"
                            autocomplete="off" required>
                        <?php if (isset($validation)): ?>
                        <div class="invalid-feedback"><?= $validation->getError('tanggal_pemesanan') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lama Pemesanan (hari)</label>
                        <input type="number" class="form-control" name="lama_pemesanan" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Harga</label>
                        <input type="number" class="form-control" name="total_harga" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jaminan Identitas</label>
                        <input type="file" class="form-control" name="jaminan_identitas" autocomplete="off" required>
                        <?php if (isset($validation)): ?>
                        <div class="invalid-feedback"><?= $validation->getError('jaminan_identitas') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pelanggan</label>
                        <select class="form-control" name="pelanggan_id" required>
                            <option value="" disabled selected>Pilih Pelanggan</option>
                            <?php foreach ($pelanggan as $data): ?>
                            <option value="<?= $data['id_pelanggan'] ?>"><?= $data['nama_pelanggan'] ?> -
                                <?= $data['kode_pelanggan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($validation)): ?>
                        <div class="invalid-feedback"><?= $validation->getError('pelanggan_id') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kendaraan</label>
                        <select class="form-control" name="kendaraan_id" required>
                            <option value="" disabled selected>Pilih Kendaraan</option>
                            <?php foreach ($kendaraan as $data): ?>
                            <option value="<?= $data['id_kendaraan'] ?>"><?= $data['nama_kendaraan'] ?> -
                                <?= nominal($data['harga_sewa_kendaraan']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between pt-2">
                        <a href="<?= base_url('pelanggan') ?>" class="btn btn-warning">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
setTimeout(function() {
    let alert = document.querySelector('.alert');
    if (alert) {
        alert.remove();
    }
}, 5000); // 5000 ms = 5 detik
</script>

<?= $this->endSection() ?>