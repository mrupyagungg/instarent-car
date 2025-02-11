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
    <form action="<?= base_url('pemesanan/create') ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Kode Pemesanan</label>
                    <input type="text" class="form-control" value="<?= $kode_pemesanan ?>" disabled>
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

                <div class="mb-3">
                    <label class="form-label">Tanggal Awal</label>
                    <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lama Pemesanan (hari)</label>
                    <input type="number" class="form-control" name="lama_pemesanan" id="lama_pemesanan" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jaminan Identitas</label>
                    <input type="file" class="form-control" name="jaminan_identitas" required>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" value="<?= session()->get('username') ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Kendaraan</label>
                    <div class="row">
                        <?php foreach ($kendaraan as $data): ?>
                        <div class="col-md-6">
                            <div class="card"
                                onclick="selectKendaraan(<?= $data['id_kendaraan'] ?>, <?= $data['harga_sewa_kendaraan'] ?>)">
                                <img src="<?= base_url('uploads/' . esc($data['gambar_kendaraan'])) ?>" class="w-100"
                                    style="height: 150px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= esc($data['nama_kendaraan']) ?></h5>
                                    <p class="card-text">Rp<?= number_format($data['harga_sewa_kendaraan'], 2) ?> / hari
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="kendaraan_id" id="kendaraan_id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Harga</label>
                    <input type="text" class="form-control" name="total_harga" id="total_harga" disabled>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-3">
            <a href="<?= base_url('pelanggan') ?>" class="btn btn-warning">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
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

<?= $this->endSection() ?>