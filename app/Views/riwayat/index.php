<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>

<!-- Link Bootstrap & CSS Tambahan -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/detail.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

<div class="container">
    <style>
    .breadcrumb-item+.breadcrumb-item::before {
        content: none;
    }
    </style>

    <div class="container mt-4">

        <section class="section contact">
            <div class="container">
                <h2>Riwayat Pemesanan</h2>

                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($riwayat)) : ?>
                        <?php foreach ($riwayat as $i => $r) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($r['kode_pemesanan']) ?></td>
                            <td><?= esc($r['tanggal_pemesanan']) ?></td>
                            <td><?= esc($r['status']) ?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="4">Belum ada pemesanan.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>


            </div>
        </section>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(() => {
        document.getElementById('success-alert')?.remove();
        document.getElementById('error-alert')?.remove();
    }, 4000);
});
</script>

<?= $this->endSection() ?>