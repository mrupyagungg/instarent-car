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
<style>
.breadcrumb-item+.breadcrumb-item::before {
    content: none;
}
</style>
<!-- Home Content -->
<div id="home">
    <!-- Menampilkan Flash Message -->

    <div class="breadcrumb">
        <div class="breadcrumb-item active" aria-current="page">
            <span>Registrasi</span>
        </div>
        <div class="breadcrumb-item">
            <a href="<?= base_url('pemesanan/add_data_pemesanan') ?>">Pesan</a>
        </div>
        <div class="breadcrumb-item">
            <a href="<?= base_url('bayar') ?>">Bayar</a>
        </div>
    </div>




    <div class="container">
        <?php if (session()->getFlashdata('success')): ?>
        <div class="custom-alert fade-in" id="success-alert">
            <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-danger fade-in" id="error-alert">
            <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>
        <!-- Header Title -->
        <h2 class="mb-4">Detail <?= esc($kendaraan['jenis_kendaraan']) ?></h2>

        <div class="row">

            <!-- Column 1: Data Kendaraan -->
            <div class="col">
                <h4 class="form-header">Spesifikasi</h4>
                <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'], 'url')) ?>" alt="Detail Mobil"
                    class="img-fluid detail-img">
                <br>
                <h2 class="mb-4 justify-content-center"> <?= strtoupper(esc($kendaraan['merk_kendaraan'])) ?>
                    <?= strtoupper(esc($kendaraan['nama_kendaraan'])) ?></h2><br>
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
                        <a href="/pemesanan/add_data_pemesanan" style="color: white; text-decoration: none;">
                            <span>Lanjut</span>
                        </a>
                    </button>
                    <?php endif; ?>


                </form>
            </div>


        </div>
    </div>

    <script>
    // Validasi client-side
    const pelangganForm = document.getElementById('pelangganForm');
    pelangganForm.addEventListener('submit', function(event) {
        const formValid = pelangganForm.checkValidity();
        if (!formValid) {
            event.preventDefault();
            alert('Mohon lengkapi semua data sebelum melanjutkan!');
        }
    });

    // Auto-hide alert
    document.addEventListener("DOMContentLoaded", function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        // Fungsi untuk menghilangkan alert setelah 4 detik
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 4000); // 4 detik
        }

        if (errorAlert) {
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 4000); // 4 detik
        }

        // Tampilkan tombol lanjut setelah berhasil
        const btnLanjut = document.getElementById('btnLanjut');
        if (btnLanjut && successAlert) {
            btnLanjut.style.display = 'block'; // Tampilkan tombol Lanjut
        }
    });

    // Fungsi untuk format Rupiah
    function formatRupiah(value) {
        value = value.replace(/[^0-9]/g, ''); // Menghapus karakter non-numerik
        return 'Rp ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Format ke format Rupiah
    }

    // Kalkulasi total harga dan lama pemesanan
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalAwalInput = document.getElementById('tanggal_awal');
        const tanggalAkhirInput = document.getElementById('tanggal_akhir');
        const totalHargaInput = document.getElementById('total_harga');
        const lamaPemesananInput = document.getElementById('lama_pemesanan');
        const hargaPerHari = <?= esc($kendaraan['harga_sewa_kendaraan']) ?>; // Harga per hari

        function calculateTotalHarga() {
            const tanggalAwal = new Date(tanggalAwalInput.value); // Ubah ke format Date
            const tanggalAkhir = new Date(tanggalAkhirInput.value); // Ubah ke format Date

            if (tanggalAwal && tanggalAkhir && tanggalAwal <= tanggalAkhir) {
                const durasi = Math.ceil((tanggalAkhir - tanggalAwal) / (1000 * 60 * 60 * 24)) + 1;
                const totalHarga = durasi * hargaPerHari;

                totalHargaInput.value = formatRupiah(totalHarga.toString()); // Update total harga
                lamaPemesananInput.value = durasi; // Set durasi pemesanan
            } else {
                totalHargaInput.value = formatRupiah(hargaPerHari.toString()); // Reset total harga
                lamaPemesananInput.value = ''; // Kosongkan durasi
            }
        }

        // Event listener untuk perubahan input tanggal
        tanggalAwalInput.addEventListener('change', calculateTotalHarga);
        tanggalAkhirInput.addEventListener('change', calculateTotalHarga);
    });

    // Script untuk menampilkan tombol "Lanjut" setelah data berhasil disimpan
    document.addEventListener("DOMContentLoaded", function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');
        const btnLanjut = document.getElementById('btnLanjut');

        // Hide the success/error alerts after 4 seconds
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 4000);
        }

        if (errorAlert) {
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 4000);
        }

        // Show the "Lanjut" button if the success alert is shown
        if (successAlert) {
            btnLanjut.style.display = 'block'; // Display the button when success alert is present
        } else {
            btnLanjut.style.display = 'none'; // Hide the button if no success alert
        }
    });

    const pelangganForm = document.getElementById('pelangganForm');
    pelangganForm.addEventListener('submit', function(event) {
    const formValid = pelangganForm.checkValidity();
    if (!formValid) {
        event.preventDefault();
        alert('Mohon lengkapi semua data sebelum melanjutkan!');
    }
    });

    });
    </script>


    <!-- End content section -->
    <?= $this->endSection() ?>