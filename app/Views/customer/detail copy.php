<?= $this->extend('template/layout') ?>

<!-- Content section -->
<?= $this->section('content') ?>

<!-- Material Icons CDN -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/detail.css') ?>">


<!-- Home Content -->
<div id="home">
<div class="breadcrumb">
    <div class="breadcrumb-item active">
        <span>Registrasi</span>
    </div>
    <div class="breadcrumb-item">
        <span>Pesan</span>
    </div>
    <div class="breadcrumb-item">
        <span>Bayar</span>
    </div>
</div>
    <div class="container">
        <!-- Header Title -->
        <h2 class="mb-4">Detail <?= esc($kendaraan['jenis_kendaraan']) ?></h2>

        <div class="row">
            <!-- Column 1: data kendaraan -->
            <div class="col">
                <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'], 'url')) ?>" alt="Detail Mobil"
                    class="img-fluid"><br>
                <h4 class="form-header">Spesifikasi</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>Tahun</strong></td>
                            <td><?= esc($kendaraan['tahun_kendaraan']) ?>
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
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>

                <form action="/customer/store" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                            value="<?= old('nama_pelanggan') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp_pelanggan">No Telepon</label>
                        <input type="text" class="form-control" id="no_telp_pelanggan" name="no_telp_pelanggan"
                            value="<?= old('no_telp_pelanggan') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email_pelanggan">Email</label>
                        <input type="email" class="form-control" id="email_pelanggan" name="email_pelanggan"
                            value="<?= old('email_pelanggan') ?>" required>
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>


            <!-- Column 3: Booking Information -->
            <div class="col">
                <h4 class="form-header">Detail Pesanan</h4>

                <form action="<?= base_url('pelanggan/add_data_pelanggan/' . esc($kendaraan['id_kendaraan'])) ?>"
                    method="post">
                    <div class="mb-3">
                        <label for="tanggal_awal" class="form-label"><strong>Tanggal Awal:</strong></label>
                        <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control"
                            placeholder="dd/mm/yy">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_akhir" class="form-label"><strong>Tanggal Akhir:</strong></label>
                        <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control"
                            placeholder="dd/mm/yy">
                    </div>

                    <div class="mb-3">
                        <label for="total_harga" class="form-label"><strong>Total Harga:</strong></label>
                        <input type="text" id="total_harga" name="total_harga" class="form-control"
                            value="<?= 'Rp ' . number_format($kendaraan['harga_sewa_kendaraan'], 0, ',', '.') ?>"
                            disabled>
                    </div>

                    <div class="mb-3">
                        <label for="lama_pemesanan" class="form-label"><strong>Lama Pemesanan (Hari):</strong></label>
                        <input type="number" id="lama_pemesanan" name="lama_pemesanan" class="form-control" disabled>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const tanggalAwalInput = document.getElementById('tanggal_awal');
                    const tanggalAkhirInput = document.getElementById('tanggal_akhir');
                    const totalHargaInput = document.getElementById('total_harga');
                    const lamaPemesananInput = document.getElementById('lama_pemesanan');
                    const hargaPerHari = <?= esc($kendaraan['harga_sewa_kendaraan']) ?>; // Harga per hari

                    // Function to format Rupiah
                    function formatRupiah(value) {
                        value = value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
                        return 'Rp ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Format value to Rupiah
                    }

                    // Function to calculate and update total price and booking duration
                    function calculateTotalHarga() {
                        const tanggalAwal = new Date(tanggalAwalInput.value); // Convert to Date
                        const tanggalAkhir = new Date(tanggalAkhirInput.value); // Convert to Date

                        if (tanggalAwal && tanggalAkhir && tanggalAwal <= tanggalAkhir) {
                            const durasi = Math.ceil((tanggalAkhir - tanggalAwal) / (1000 * 60 * 60 * 24)) + 1;
                            const totalHarga = durasi * hargaPerHari;

                            // Update total price and booking duration
                            totalHargaInput.value = formatRupiah(totalHarga.toString());
                            lamaPemesananInput.value = durasi; // Set the number of days
                        } else {
                            totalHargaInput.value = formatRupiah(hargaPerHari.toString());
                            lamaPemesananInput.value = ''; // Clear the duration if invalid
                        }
                    }

                    // Event listeners for date input changes
                    tanggalAwalInput.addEventListener('change', calculateTotalHarga);
                    tanggalAkhirInput.addEventListener('change', calculateTotalHarga);
                });
                </script>

                <p class="mt-3 text-center">atau hubungi</p>
                <p class="text-center text-muted">0822-2123-2123</p>
            </div>  
        </div>
    </div>
</div>

<!-- End content section -->
<?= $this->endSection() ?>