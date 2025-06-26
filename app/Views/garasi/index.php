<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>

<<<<<<< HEAD
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<div class="container mt-4">

=======
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
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

<<<<<<< HEAD
    <div class="container mt-4">
        <section id="featured-car">
            <h2 class="text-center mb-4 mt-4 text-dark fw-bold">Garasi Kendaraan</h2>

            <!-- Search & Filter -->
            <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                <input type="search" id="searchInput" class="form-control w-auto" placeholder="Cari kendaraan..."
                    onkeyup="filterKendaraanBySearch()" style="min-width: 250px; max-width: 300px;">

                <div class="btn-group" role="group" aria-label="Filter kendaraan">
                    <button type="button" class="btn btn-outline-primary"
                        onclick="filterKendaraan('all')">Semua</button>
                    <button type="button" class="btn btn-outline-primary"
                        onclick="filterKendaraan('mobil')">Mobil</button>
                    <button type="button" class="btn btn-outline-primary"
                        onclick="filterKendaraan('motor')">Motor</button>
                </div>
            </div>

            <h3 class="mb-3">Kendaraan Ready</h3>

            <div class="row row-cols-1 row-cols-md-3 g-4" id="kendaraan-list-ready">
                <?php foreach ($kendaraan_ready as $kendaraan): ?>
                <div class="col kendaraan-item" data-type="<?= esc(strtolower($kendaraan['jenis_kendaraan'])) ?>">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'])) ?>"
                            class="card-img-top" alt="Gambar <?= esc($kendaraan['nama_kendaraan']) ?>"
                            style="width: 100%; height: 250px; object-fit: cover; border-bottom: 1px solid #dee2e6;">


                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <a href="<?= base_url('detail/' . esc($kendaraan['id_kendaraan'])) ?>"
                                    class="text-decoration-none text-dark">
                                    <?= esc(ucwords($kendaraan['merk_kendaraan'])) ?>
                                    <?= esc(ucwords($kendaraan['nama_kendaraan'])) ?>
                                </a>
                            </h5>

                            <p class="card-text mb-1"><small class="text-muted">Tahun:
                                    <?= esc($kendaraan['tahun_kendaraan']) ?></small></p>

                            <ul class="list-inline mb-3">
                                <li class="list-inline-item">
                                    <i class="fas fa-gas-pump"></i> Bensin
                                </li>
                                <li class="list-inline-item">
                                    <i class="fas fa-car"></i> <?= esc(ucwords($kendaraan['merk_kendaraan'])) ?>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fas fa-palette"></i> <?= esc(ucwords($kendaraan['warna_kendaraan'])) ?>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fas fa-info-circle"></i>
                                    <?php 
                                    $status = strtolower($kendaraan['status_kendaraan']);
                                    if ($status === 'ready') {
                                        echo '<span class="badge bg-success">Ready</span>';
                                    } elseif ($status === 'not ready') {
                                        echo '<span class="badge bg-danger">Tidak Tersedia</span>';
                                    } else {
                                        echo '<span class="badge bg-secondary">' . esc(ucwords($kendaraan['status_kendaraan'])) . '</span>';
                                    }
                                ?>
                                </li>
                            </ul>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">
                                    Rp <?= number_format($kendaraan['harga_sewa_kendaraan'], 0, ',', '.') ?> / day
                                </span>
                                <div>
                                    <?php if (isset($pelanggan) && $pelanggan): ?>
                                    <a href="<?= base_url('pemesanan/add_data_pemesanan/' . esc($kendaraan['id_kendaraan'])) ?>"
                                        class="btn btn-success btn-sm me-2">
                                        Rent now
                                    </a>
                                    <?php else: ?>
                                    <a href="<?= base_url('detail/' . esc($kendaraan['id_kendaraan'])) ?>"
                                        class="btn btn-primary btn-sm me-2">
                                        Rent now
                                    </a>
                                    <?php endif; ?>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>

<!-- Bootstrap JS (for future optional use) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
function filterKendaraan(type) {
    const items = document.querySelectorAll('.kendaraan-item');
    items.forEach(item => {
        if (type === 'all' || item.dataset.type === type) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });

    // Clear search input when filtering
    document.getElementById('searchInput').value = '';
}

function filterKendaraanBySearch() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const items = document.querySelectorAll('.kendaraan-item');

    items.forEach(item => {
        const text = item.querySelector('.card-title a').textContent.toLowerCase();
        if (text.includes(input)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
=======

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
                                    <ion-icon name="color-palette"></ion-icon>
                                    <span class="card-item-text">
                                        <?= esc(ucwords($kendaraan['status_kendaraan'])) ?>
                                    </span>
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
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
        }
    });
}
</script>

<<<<<<< HEAD
=======
<script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
<?= $this->endSection() ?>