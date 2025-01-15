<div class="left_sidebar">
    <nav class="sidebar">
        <div class="user-info">
            <div class="image"><a href="javascript:void(0);"><img src="<?= base_url('assets/images/user.png') ?>"
                        alt="User"></a></div>
            <div class="detail mt-3">
                <h5 class="mb-0"><?= session()->get('username'); ?></h5>
                <h5 class="mb-0" style="color: #808080;"><?= session()->get('email'); ?></h5>
            </div>
        </div>
        <ul id="main-menu" class="metismenu">
            <li class="g_heading">Main</li>
            <li class="active"><a href="<?= base_url('/dashboard') ?>"><i class="ti-home"></i><span>Dashboard</span></a></li>

            <li class="g_heading">Master</li>
            <li><a href="<?= base_url('coa') ?>"><i class="ti-calendar"></i><span>COA</span></a></li>
            </li>
            <li><a href="<?= base_url('kendaraan') ?>"><i class="ti-car"></i><span>Kendaraan</span></a>
            </li>
            <li><a href="<?= base_url('jenispengeluaran') ?>"><i class="ti-email"></i><span>Jenis Pengeluaran</span></a>
            </li>

            <li class="g_heading">Transaksi</li>
            <li><a href="<?= base_url('pengeluaran') ?>"><i class="ti-id-badge"></i><span>Pengeluaran</span></a></li>
            <li><a href="<?= base_url('pemesanan') ?>"><i class="ti-id-badge"></i><span>Pemesanan</span></a></li>
            <li><a href="<?= base_url('pelanggan') ?>"><i class="ti-id-badge"></i><span>Pelanggan</span></a></li>

            <li class="g_heading">Laporan</li>
            <li><a href="<?= base_url('jurnal') ?>"><i class="ti-file"></i><span>Jurnal Umum</span></a></li>
            <li><a href="<?= base_url('buku-besar') ?>"><i class="ti-user"></i><span>Buku Besar</span></a></li>
            <li><a href="<?= base_url('laba-rugi') ?>"><i class="ti-menu-alt"></i><span>Laba Rugi</span></a></li>

        </ul>
    </nav>
</div>