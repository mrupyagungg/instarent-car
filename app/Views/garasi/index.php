<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>

<!-- Bootstrap & Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">


<style>
.navbar-header h3 {
    font-family: 'Lobster', cursive;
    font-size: 35px;
    color: black;
}

.hero-forms {
    /* max-width: 500px; */
    background: rgba(255, 255, 255, 0.47);
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    margin: 50px auto;
}

.input-wrapper {
    margin-bottom: 10px;
}

.input-label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

.input-field {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.input-field:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    outline: none;
}

.btn {
    width: 50%;
    padding: 10px;
    margin-left: 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn:hover {
    background: linear-gradient(135deg, #0056b3, #007bff);
    color: white;
    transform: scale(1.05);
}

.card-banner {
    /* Warna latar belakang putih */
    padding: 10px;
    /* Tambahkan padding agar gambar tidak terlalu mepet */
    border-radius: 8px;
    /* Opsional: buat sudut lebih halus */
    display: flex;
    justify-content: center;
    /* Pusatkan gambar */
    align-items: center;
}

.card-banner img {

    /* Warna latar belakang putih */
    max-width: 100%;
    /* Pastikan gambar tidak melebihi area */
    border-radius: 5px;
    /* Opsional: buat sudut gambar lebih lembut */
}

.filter-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
}
</style>

<div class="container mt-4">
    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>


    <section class="section featured-car" id="featured-car">
        <div class="container">
            <h2 class="text-center mb-1 text-dark font-weight-bold">Garasi Kendaraan</h2><br><br>

            <div class="filter-buttons">
                <button class=" btn-warning" onclick="filterKendaraan('all')">Semua</button>
                <button class=" btn-warning" onclick="filterKendaraan('mobil')">Mobil</button>
                <button class=" btn-warning" onclick="filterKendaraan('motor')">Motor</button>
            </div>
            <ul class="featured-car-list" id="kendaraan-list">
                <?php foreach ($kendaraan as $kendaraan): ?>
                <li class="kendaraan-item" data-type="<?= esc(strtolower($kendaraan['jenis_kendaraan'])) ?>">
                    <div class="featured-car-card">
                        <figure class="card-banner"
                            style="background-color: white; padding: 10px; border-radius: 8px; text-align: center;">
                            <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'])) ?>" alt="Car Image"
                                style="max-width: 100%; border-radius: 5px;">
                        </figure>
                        <div class="card-content">
                            <div class="card-title-wrapper">
                                <h3 class="h3 card-title">
                                    <a href="<?= base_url('detail/' . esc($kendaraan['id_kendaraan'])) ?>">
                                        <?= esc(ucwords($kendaraan['merk_kendaraan'])) ?>
                                        <?= esc(ucwords($kendaraan['nama_kendaraan'])) ?>
                                    </a>
                                </h3>
                                <data class="year" value="<?= esc($kendaraan['tahun_kendaraan']) ?>">
                                    <?= esc($kendaraan['tahun_kendaraan']) ?>
                                </data>
                            </div>
                            <ul class="card-list">
                                <li class="card-list-item">
                                    <ion-icon name="flash-outline"></ion-icon>
                                    <span class="card-item-text">Bensin</span>
                                </li>
                                <li class="card-list-item">
                                    <ion-icon name="checkmark-circle"></ion-icon>
                                    <span class="card-item-text">Ready</span>
                                </li>
                                <li class="card-list-item">
                                    <ion-icon name="car-sport-outline"></ion-icon>
                                    <span class="card-item-text">
                                        <?= esc(ucwords($kendaraan['merk_kendaraan'])) ?>
                                    </span>
                                </li>
                                <li class="card-list-item">
                                    <ion-icon name="color-palette"></ion-icon>
                                    <span class="card-item-text">
                                        <?= esc(ucwords($kendaraan['warna_kendaraan'])) ?>
                                    </span>
                                </li>
                            </ul>
                            <div class="card-price-wrapper">
                                <p class="card-price">
                                    <strong><?= number_format($kendaraan['harga_sewa_kendaraan'], 2) ?></strong> / day
                                </p>
                                <a href="<?= base_url('detail/' . esc($kendaraan['id_kendaraan'])) ?>" class="btn">Rent
                                    now</a>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</div>

<script>
function filterKendaraan(type) {
    let kendaraanItems = document.querySelectorAll(".kendaraan-item");
    kendaraanItems.forEach(item => {
        if (type === "all" || item.getAttribute("data-type") === type) {
            item.style.display = "block";
        } else {
            item.style.display = "none";
        }
    });
}
</script>

<script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?= $this->endSection() ?>