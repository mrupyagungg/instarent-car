<!-- app/Views/layout.php -->
<?= $this->include('template/header') ?> <!-- Memuat header.php -->

<main>
    <?= $this->renderSection('content') ?> <!-- Bagian ini akan diisi oleh konten spesifik halaman -->
</main>

<!-- Load jQuery terlebih dahulu -->
<script src="<?= base_url('assets/js/jquery.js') ?>"></script>

<!-- Modernizr untuk fitur pendeteksian -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!-- Load Bootstrap JS setelah jQuery -->
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

<!-- Plugin lain yang membutuhkan jQuery -->
<script src="<?= base_url('assets/js/bootsnav.js') ?>"></script>
<script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>

<!-- Plugin tambahan -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- File custom JavaScript Anda -->
<script src="<?= base_url('assets/js/custom.js') ?>"></script>