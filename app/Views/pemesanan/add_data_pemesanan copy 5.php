<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.breadcrumb {
    background-color: #f8f9fa;
    padding: 10px 15px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.breadcrumb-item.active {
    font-weight: bold;
    color: #007bff;
}

.form-header {
    font-size: 24px;
    font-weight: bold;
    color: #343a40;
    margin-bottom: 20px;
}

.card {
    border: 1px solid #e3e6f0;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

.card:hover,
.card.selected {
    transform: scale(1.02);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    border: 2px solid #007bff;
}

.breadcrumb-item+.breadcrumb-item::before {
    content: none;
}
</style>

<div class="container mt-4">
    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success" id="success-alert">
        <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger" id="error-alert">
        <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Registrasi</li>
            <li class="breadcrumb-item active" aria-current="page">Pesan</li>
            <li class="breadcrumb-item"><a href="<?= base_url('bayar') ?>">Bayar</a></li>
        </ol>
    </nav>

    <h4 class="form-header">Book Now</h4>
    <form action="<?= base_url('pemesanan/create') ?>" method="POST" enctype="multipart/form-data"
        class="no-validated row g-3">
        <div class="col-md-6 mb-3">
            <label class="form-label">Kode Pemesanan</label>
            <input type="text" class="form-control" name="kode_pemesanan" value="<?= $kode_pemesanan ?>"
                autocomplete="off" disabled>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Tanggal Pemesanan</label>
            <input type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan"
                value="<?= date('Y-m-d') ?>" autocomplete="off" readonly>
        </div>
        <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal_pemesanan').setAttribute('min', today);
        </script>

        <!-- Tanggal Awal -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Tanggal Awal</label>
            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" required>
            <?php if (isset($validation)): ?>
            <span class="badge bg-danger"> <?= $validation->getError('tanggal_awal') ?></span>
            <?php endif; ?>
        </div>

        <!-- Tanggal Akhir -->
        <div class="col-md-6 mb-3">
            <label class="form-label">Tanggal Akhir</label>
            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required>
            <?php if (isset($validation)): ?>
            <span class="badge bg-danger"> <?= $validation->getError('tanggal_akhir') ?></span>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="lama_pemesanan" class="form-label">Lama Pemesanan (Hari)</label>
            <input type="text" class="form-control" id="lama_pemesanan" name="lama_pemesanan" readonly>
        </div>

        <div class="col-md-12 mb-3">
            <label class="form-label">Jaminan Identitas</label>
            <input type="file" class="form-control" name="jaminan_identitas" autocomplete="off">
            <?php if (isset($validation)): ?>
            <span class="badge bg-danger"> <?= $validation->getError('jaminan_identitas') ?></span>
            <?php endif; ?>
        </div>

        <div class="col-md-12 mb-3">
            <label class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                value="<?= isset($lastPelanggan) ? $lastPelanggan['nama_pelanggan'] : '' ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="kendaraan_id" class="form-label">Pilih Kendaraan</label>
            <input type="hidden" id="kendaraan_id" name="kendaraan_id">
            <div class="row ">
                <?php foreach ($kendaraan as $item): ?>
                <div class="col-md-3 mb-2">
                    <div class="card p-3"
                        onclick="selectKendaraan(<?= $item['id_kendaraan'] ?>, <?= $item['harga_sewa_kendaraan'] ?>, event)">
                        <h5><?= $item['nama_kendaraan'] ?></h5>
                        <p>Harga per hari: Rp<?= number_format($item['harga_sewa_kendaraan'], 0, ',', '.') ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga" disabled>
        </div>

        <hr>

        <div class="col-12 pt-2">
            <a href="<?= base_url('pelanggan') ?>" class="btn btn-warning"> Batal</a>
            <button type="submit" class="btn btn-primary"> Simpan</button>
        </div>
    </form>

</div>

<script>
function selectKendaraan(id, harga) {
    document.getElementById('kendaraan_id').value = id;
    document.querySelectorAll('.card').forEach(card => card.classList.remove('selected'));
    event.currentTarget.classList.add('selected');
    document.getElementById('total_harga').value = harga;
    hitungTotalHarga();
}

function hitungLamaPemesanan() {
    let tglAwal = new Date(document.getElementById("tanggal_awal").value);
    let tglAkhir = new Date(document.getElementById("tanggal_akhir").value);

    if (tglAwal && tglAkhir && tglAkhir >= tglAwal) {
        let selisihHari = Math.ceil((tglAkhir - tglAwal) / (1000 * 60 * 60 * 24));
        document.getElementById("lama_pemesanan").value = selisihHari;
        hitungTotalHarga();
    } else {
        document.getElementById("tanggal_akhir").value = "";
        alert("Tanggal akhir harus setelah atau sama dengan tanggal awal!");
    }
}

function hitungTotalHarga() {
    let lama = parseInt(document.getElementById("lama_pemesanan").value) || 0;
    let harga = parseFloat(document.getElementById("total_harga").value) || 0;
    document.getElementById("total_harga").value = lama * harga;
}

document.getElementById("tanggal_awal").addEventListener("change", hitungLamaPemesanan);
document.getElementById("tanggal_akhir").addEventListener("change", hitungLamaPemesanan);
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var pelangganSelect = document.querySelector("select[name='pelanggan_id']");
    var namaPelangganInput = document.getElementById("nama_pelanggan");

    pelangganSelect.addEventListener("change", function() {
        var selectedOption = pelangganSelect.options[pelangganSelect.selectedIndex];
        namaPelangganInput.value = selectedOption.text.split(" - ")[0];
    });
});
</script>

<?= $this->endSection() ?>