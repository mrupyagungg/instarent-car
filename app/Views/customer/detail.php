<!-- app/Views/home.php -->
<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>


<!-- Konten halaman home -->
<div id="home">

    <div class="container mt-50">
        <h2>Detail <?= esc($kendaraan['jenis_kendaraan']) ?></h2>
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'], 'url')) ?>" alt="Detail Mobil" class="img-fluid mb-3">
            </div>
            <div class="col-md-6">
                <h3><?= esc(ucwords($kendaraan['merk_kendaraan'] . ' ' . $kendaraan['nama_kendaraan'])) ?></h3>
                <p><strong>Tahun:</strong> <?= esc($kendaraan['tahun_kendaraan']) ?></p>
                <p><strong>Warna Kendaraan:</strong> <?= esc($kendaraan['warna_kendaraan']) ?></p>
                <p><strong>Harga Sewa:</strong> Rp. <?= number_format(esc($kendaraan['harga_sewa_kendaraan']), 2) ?> /hari</p>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non.</p>

                <!-- Form Pemesanan -->
                <h4 class="form-header">Form Pemesanan</h4>
                <form id="orderForm" method="POST" action="<?= base_url('order/submit') ?>"> <!-- pastikan untuk mengatur action ke endpoint yang benar -->
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Pemesan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input class="form-control" type="text" id="name" name="name" value="<?= esc(session()->get('username')) ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input class="form-control" type="email" id="email" name="email" value="<?= esc(session()->get('email')) ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Masukkan nomor telepon" required pattern="[0-9]{10,15}" title="Nomor telepon harus 10-15 digit angka.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rental_date" class="form-label">Tanggal Penyewaan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="date" class="form-control" id="rental_date" name="rental_date" min="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Pesan Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>