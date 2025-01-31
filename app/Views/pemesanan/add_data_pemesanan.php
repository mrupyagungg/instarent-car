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
    <!-- Flash Message -->
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

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">Registrasi</li>
            <li class="breadcrumb-item active" aria-current="page">Pesan</li>
            <li class="breadcrumb-item"><a href="<?= base_url('bayar') ?>">Bayar</a></li>
        </ol>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="form-header">Book Now</h4>
                <form action="<?= base_url('pemesanan/create') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kode Pemesanan</label>
                                <input type="text" class="form-control" value="<?= $kode_pemesanan ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Awal</label>
                                <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="tanggal_akhir" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lama Pemesanan (hari)</label>
                                <input type="number" class="form-control" name="lama_pemesanan" id="lama_pemesanan"
                                    required readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jaminan Identitas</label>
                                <input type="file" class="form-control" name="jaminan_identitas" required>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                                    value="<?= old('nama_pelanggan', session()->get('username')) ?>" required disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pilih Kendaraan</label>
                                <div class="row">
                                    <?php foreach ($kendaraan as $data): ?>
                                    <div class="col-md-6">
                                        <div class="card"
                                            onclick="selectKendaraan(<?= htmlspecialchars($data['id_kendaraan']) ?>)">
                                            <img src="<?= base_url('uploads/' . esc($data['gambar_kendaraan'])) ?>"
                                                class="w-100" style="height: 150px; object-fit: cover;">
                                            <div class="card-body text-center">
                                                <h5 class="card-title"><?= esc($data['nama_kendaraan']) ?></h5>
                                                <p class="card-text">
                                                    Rp<?= number_format($data['harga_sewa_kendaraan'], 2) ?> / hari
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
                                <input type="number" class="form-control" name="total_harga" id="total_harga" required
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-3">
                        <a href="<?= base_url('pelanggan') ?>" class="btn btn-warning">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function selectKendaraan(id) {
        document.getElementById('kendaraan_id').value = id;
        document.querySelectorAll('.card').forEach(card => card.classList.remove('selected'));
        let selectedCard = document.querySelector(`.card[onclick="selectKendaraan(${id})"]`);
        selectedCard.classList.add('selected');

        // Ambil harga kendaraan yang dipilih
        let hargaKendaraan = selectedCard.querySelector('.card-text').textContent;
        hargaKendaraan = hargaKendaraan.replace('Rp', '').replace(/[^0-9,-]+/g, '').replace(',', '');

        // Konversi harga kendaraan ke angka
        hargaKendaraan = parseFloat(hargaKendaraan);

        // Pastikan harga kendaraan valid sebelum diinputkan
        if (!isNaN(hargaKendaraan)) {
            document.querySelector("#total_harga").value = hargaKendaraan;
            hitungTotalHarga(); // Panggil fungsi untuk menghitung total harga
        }
    }

    function hitungLamaPemesanan() {
        let tanggalAwal = document.getElementById("tanggal_awal").value;
        let tanggalAkhir = document.querySelector("input[name='tanggal_akhir']").value;
        let inputLamaPemesanan = document.getElementById("lama_pemesanan");

        if (tanggalAwal && tanggalAkhir) {
            let tglAwal = new Date(tanggalAwal);
            let tglAkhir = new Date(tanggalAkhir);

            if (tglAkhir >= tglAwal) {
                let selisihHari = Math.ceil((tglAkhir - tglAwal) / (1000 * 60 * 60 * 24));
                inputLamaPemesanan.value = selisihHari;
                hitungTotalHarga(); // Panggil fungsi untuk menghitung total harga
            } else {
                alert("Tanggal akhir harus setelah atau sama dengan tanggal awal!");
                document.querySelector("input[name='tanggal_akhir']").value = "";
                inputLamaPemesanan.value = "";
            }
        }
    }

    function hitungTotalHarga() {
        let lamaPemesanan = document.querySelector("input[name='lama_pemesanan']").value;
        let hargaKendaraan = document.querySelector("#total_harga").value;

        // Pastikan nilai lamaPemesanan dan hargaKendaraan adalah angka
        lamaPemesanan = parseInt(lamaPemesanan);
        hargaKendaraan = parseFloat(hargaKendaraan);

        if (!isNaN(lamaPemesanan) && !isNaN(hargaKendaraan)) {
            let totalHarga = lamaPemesanan * hargaKendaraan;
            document.querySelector("#total_harga").value = totalHarga;
        }
    }

    // Tambahkan event listener ke input tanggal awal dan akhir
    document.getElementById("tanggal_awal").addEventListener("change", hitungLamaPemesanan);
    document.querySelector("input[name='tanggal_akhir']").addEventListener("change", hitungLamaPemesanan);
    </script>

    <?= $this->endSection() ?>