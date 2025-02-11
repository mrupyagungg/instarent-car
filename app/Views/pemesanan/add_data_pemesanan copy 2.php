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
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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


        <div class="mb-3">
            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required>
        </div>

        <div class="mb-3">
            <label for="lama_pemesanan" class="form-label">Lama Pemesanan (Hari)</label>
            <input type="text" class="form-control" id="lama_pemesanan" name="lama_pemesanan" readonly>
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
            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
</div>

<script>
function selectKendaraan(id, harga, event) {
    document.getElementById('kendaraan_id').value = id;
    document.querySelectorAll('.card').forEach(card => card.classList.remove('selected'));
    event.target.closest('.card').classList.add('selected');
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