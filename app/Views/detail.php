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
                    class="img-fluid">
                <h3>deskripsi</h3>
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
                            <td><?= esc($kendaraan['tahun_kendaraan']) ?>< /td>
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
                <p><strong>Lokasi:</strong> Dalam Kota</p>
                <p><strong>Durasi:</strong> 1 × 12 Jam - Sopir & BBM</p>
                <p><strong>Tanggal:</strong> 10 Des 2024</p>

                <h3 class="text-primary">Rp 450.000</h3>
                <p class="text-muted">
                    <strong>Biaya Termasuk:</strong> Sopir & BBM<br>
                    <strong>Tidak Termasuk:</strong> Makan Sopir, Parkir & Tol
                </p>

                <a href="<?= base_url('pelanggan/add_data_pelanggan/' . esc($kendaraan['id_kendaraan'])) ?>"
                    class="btn">
                    Book Now
                </a>
                <p class="mt-3 text-center">atau hubungi</p>
                <p class="text-center text-muted">0822-2123-2123</p>
            </div>
        </div>
    </div>
</div>

<!-- End content section -->
<?= $this->endSection() ?>