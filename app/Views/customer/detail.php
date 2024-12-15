<?= $this->extend('template/layout') ?>

<!-- Content section -->
<?= $this->section('content') ?>

<!-- Material Icons CDN -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

h2,
h4 {
    color: #343a40;
}

p {
    line-height: 1.6;
    color: #6c757d;
}

/* Vehicle Detail Section */
#home {
    margin-top: 50px;
    padding: 20px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#home .row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

#home .col {
    padding: 10px;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

#home .col img {
    width: 100%;
    border-radius: 8px;
    object-fit: cover;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    border-collapse: collapse;
}

.table th,
.table td {
    border: 1px solid #dee2e6;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f8f9fa;
    font-weight: bold;
}

.text-muted {
    font-size: 0.9rem;
    color: #6c757d;
}

.form-header {
    color: black;
    background-color: #f8f9fa;
    margin-bottom: 15px;
    font-size: 1.2rem;
    text-align: center;
    padding: 10px;
    border-radius: 8px;
}

.btn-warning {
    background-color: #ffc107;
    color: #212529;
    border: none;
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    text-transform: uppercase;
    font-weight: bold;
}

.btn-warning:hover {
    background-color: #e0a800;
    color: #fff;
}

.text-center {
    text-align: center;
}

.form-label {
    font-weight: bold;
    color: #495057;
}

.form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 1em;
    width: 100%;
    margin-bottom: 15px;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.form-header {
    font-size: 1.5em;
    color: #007bff;
    margin-bottom: 20px;
    text-align: center;
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 8px;
}
</style>

<!-- Home Content -->
<div id="home">
    <div class="container">
        <!-- Header Title -->
        <h2 class="mb-4">Detail <?= esc($kendaraan['jenis_kendaraan']) ?></h2>

        <div class="row">
            <!-- Column 1: Vehicle Image -->
            <div class="col">
                <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'], 'url')) ?>" alt="Detail Mobil"
                    class="img-fluid"><br>
                <h3>Deskripsi</h3>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, perspiciatis dicta!
                        Dicta soluta praesentium, voluptatum dignissimos sequi dolorum natus iure quo eum unde
                        impedit. Tenetur neque cum eos explicabo architecto?</p>
                </div>
            </div>

            <!-- Column 2: Vehicle Specifications -->
            <div class="col">
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
                        <tr>
                            <td><strong>Transmisi</strong></td>
                            <td><?= esc($kendaraan['transmisi']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Kapasitas Penumpang</strong></td>
                            <td><?= esc($kendaraan['kapasitas']) ?> Orang</td>
                        </tr>

                    </tbody>
                </table>
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
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label for="lama_pemesanan" class="form-label"><strong>Lama Pemesanan (Hari):</strong></label>
                        <input type="number" id="lama_pemesanan" name="lama_pemesanan" class="form-control" readonly>
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
            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<!-- End content section -->
<?= $this->endSection() ?>