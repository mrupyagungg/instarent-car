<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pembayaran</title>

    <!-- Midtrans Snap.js -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="your-client-key"></script>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>
<style>
.breadcrumb-item+.breadcrumb-item::before {
    content: none;
}
</style>

<body>
    <div class="container mt-5">
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
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">Registrasi</li>
                <li class="breadcrumb-item">Pesan</li>
                <li class="breadcrumb-item active" aria-current="page">Bayar</a></li>
            </ol>
        </nav>
        <div class="card shadow-lg p-4 rounded-lg">
            <h2 class="text-center mb-1 text-dark font-weight-bold">Checkout</h2>
            <h6 class="text-center mb-4 text-danger">
                *silahkan melakukan pembayaran yang sudah disediakan, harap simpan bukti pembayaran !
            </h6>
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
                <strong><i class="fas fa-check-circle"></i> Success!</strong> <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" id="error-alert" role="alert">
                <strong><i class="fas fa-exclamation-circle"></i> Error!</strong>
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php endif; ?>

            <!-- Detail Pesanan -->
            <ul class="list-group mb-4">
                <li class="list-group-item d-flex text-dark justify-content-between align-items-center"
                    style="font-size: 1rem;">
                    <strong><i class="fas fa-receipt"></i> Kode Pemesanan:</strong>
                    <span><?= esc($pemesanan['kode_pemesanan']) ?></span>
                </li>

                <li class="list-group-item d-flex text-dark justify-content-between align-items-center"
                    style="font-size: 1rem;">
                    <strong><i class="fas fa-calendar-alt"></i> Tanggal Awal:</strong>
                    <span><?= esc($pemesanan['tanggal_awal']) ?></span>
                </li>
                <li class="list-group-item d-flex text-dark justify-content-between align-items-center"
                    style="font-size: 1rem;">
                    <strong><i class="fas fa-calendar-check"></i> Tanggal Akhir:</strong>
                    <span><?= esc($pemesanan['tanggal_akhir']) ?></span>
                </li>
                <li class="list-group-item d-flex text-dark justify-content-between align-items-center"
                    style="font-size: 1rem;">
                    <strong><i class="fas fa-user"></i> Nama Pelanggan:</strong>
                    <span><?= esc((new \App\Models\PelangganModel())->find($pemesanan['pelanggan_id'])['nama_pelanggan']) ?></span>
                </li>
                <li class="list-group-item d-flex text-dark justify-content-between align-items-center"
                    style="font-size: 1rem;">
                    <strong><i class="fas fa-clock"></i> Durasi:</strong>
                    <span><?= esc($pemesanan['lama_pemesanan']) ?> hari</span>
                </li>
                <li class="list-group-item d-flex text-dark justify-content-between align-items-center"
                    style="font-size: 1rem;">
                    <strong><i class="fas fa-car"></i> Kendaraan:</strong>
                    <span><?= esc((new \App\Models\KendaraanModel())->find($pemesanan['kendaraan_id'])['nama_kendaraan']) ?></span>
                </li>
                <li class="list-group-item d-flex text-dark justify-content-between align-items-center"
                    style="font-size: 1rem;">
                    <strong><i class="fas fa-info-circle"></i> Status:</strong>
                    <span class="badge badge-warning px-3 py-2" style="font-size: 1.1rem;">Menunggu Pembayaran</span>
                </li>
                <li class="list-group-item bg-dark d-flex text-light justify-content-between align-items-center"
                    style="font-size: 1.5rem; font-weight: bold;">
                    <strong class="><i class=" fas fa-money-bill-wave"></i> Total Harga:</strong>
                    <span class="text-success">Rp<?= number_format($pemesanan['total_harga'], 0, ',', '.') ?></span>
                </li>
            </ul>

            <!-- Tombol Pembayaran -->
            <div class="text-center">
                <button id="pay-button" class="btn btn-primary btn-lg px-4 py-2">
                    <i class="fas fa-credit-card"></i> Bayar Sekarang
                </button>
            </div>
        </div>

    </div>

    <!-- Script Snap Midtrans -->
    <script>
    document.getElementById('pay-button').onclick = function() {
        snap.pay("<?= $snapToken ?>", {
            onSuccess: function(result) {
                console.log(result);
                alert("Pembayaran sukses!");
                window.location.href = "<?= base_url('customer/dashboard') ?>";
            },
            onPending: function(result) {
                console.log(result);
                alert("Menunggu pembayaran!");
            },
            onError: function(result) {
                console.log(result);
                alert("Pembayaran gagal!");
            }
        });
    };
    </script>

    <!-- Menghapus alert otomatis setelah 4 detik -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            document.getElementById('success-alert')?.remove();
            document.getElementById('error-alert')?.remove();
        }, 4000);
    });
    </script>
</body>

</html>

<?= $this->endSection() ?>