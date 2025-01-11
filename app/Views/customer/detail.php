<?= $this->extend('template/layout') ?>

<!-- Content section -->
<?= $this->section('content') ?>

<!-- Material Icons CDN -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/detail.css') ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEJpP3p5q7jD5k2f2lCZ5TO9p4a9z2emMZ4vh6dZQp+djlG1+OG0gd3cnSxd3" crossorigin="anonymous">

<!-- Home Content -->
<div id="home">
    <div class="breadcrumb">
        <div class="breadcrumb-item active">
            <span>Registrasi</span>
        </div>
        <div class="breadcrumb-item">
            <a href="<?= base_url('pemesanan/index') ?>">Pesan</a>
        </div>
        <div class="breadcrumb-item">
            <a href="<?= base_url('bayar') ?>">Bayar</a>
        </div>
    </div>

    <div class="container">
        <!-- Header Title -->
        <h2 class="mb-4">Detail <?= esc($kendaraan['jenis_kendaraan']) ?></h2>

        <div class="row">
            <!-- Column 1: Data Kendaraan -->
            <div class="col">
                <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'], 'url')) ?>" alt="Detail Mobil"
                    class="img-fluid detail-img"><br>
                <h4 class="form-header">Spesifikasi</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>Tahun</strong></td>
                            <td><?= esc($kendaraan['tahun_kendaraan']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Warna</strong></td>
                            <td><?= esc($kendaraan['warna_kendaraan']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Bahan Bakar</strong></td>
                            <td>Pertalite</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Column 2: Input Pelanggan -->
            <div class="col">
                <h4 class="form-header">Input Pelanggan</h4>
                <?php if (session()->getFlashdata('success')): ?>
                <div class="custom-alert fade-in" id="success-alert">
                    <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-danger alert-danger fade-in" id="error-alert">
                    <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
                </div>
                <?php endif; ?>

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
                        <input type="text" class="form-control" id="no_telp_pelanggan" name="no_telp_pelanggan"
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
                                <?= old('jenis_kelamin_pelanggan') === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki
                            </option>
                            <option value="Perempuan"
                                <?= old('jenis_kelamin_pelanggan') === 'Perempuan' ? 'selected' : '' ?>>Perempuan
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button><br>
                </form>

                <a href="<?= base_url('pemesanan/create' . esc($kendaraan['id_kendaraan'])) ?>" class="btn btn-success mt-2">
                    Lanjut
                </a>
            </div>
            <div class="col">
            <h4 class="form-header">Input Pelanggan</h4>
                <?php if (session()->getFlashdata('success')): ?>
                <div class="custom-alert fade-in" id="success-alert">
                    <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-danger alert-danger fade-in" id="error-alert">
                    <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
                </div>
                <?php endif; ?>


            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Validasi client-side
        const pelangganForm = document.getElementById('pelangganForm');
        pelangganForm.addEventListener('submit', function (event) {
            const formValid = pelangganForm.checkValidity();
            if (!formValid) {
                event.preventDefault();
                alert('Mohon lengkapi semua data sebelum melanjutkan!');
            }
        });

        // Auto-hide alert
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => successAlert.style.display = 'none', 4000);
        }
    </script>

    <style>
        .detail-img {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 5px;
            max-width: 100%;
            height: auto;
        }

        .breadcrumb-item a {
            text-decoration: none;
            color: #007bff;
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
        }
    </style>

<!-- End content section -->
<?= $this->endSection() ?>
