<<<<<<< HEAD
<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

=======
<?=$this->extend('templates/head'); ?>
<?=$this->section('content-admin'); ?>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Laba Rugi</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
<<<<<<< HEAD
                            <li class="breadcrumb-item"><a href="#">Jurnal</a></li>
=======
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Jurnal</a></li>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                            <li class="breadcrumb-item active">Laba Rugi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

<<<<<<< HEAD
        <!-- Filter -->
=======
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('laba-rugi/filter') ?>" method="post">
                            <div class="row">
                                <div class="form-group col-md-4 mb-1">
                                    <select class="form-control" name="month" required>
                                        <option value="" disabled selected>Bulan</option>
<<<<<<< HEAD
                                        <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?= $i ?>"><?= format_bulan($i) ?></option>
                                        <?php endfor; ?>
=======
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?= $i ?>"><?= format_bulan($i) ?></option>
                                        <?php } ?>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-1">
                                    <select class="form-control" name="year" required>
                                        <option value="" disabled selected>Tahun</option>
<<<<<<< HEAD
                                        <?php for ($y = 2023; $y <= date('Y'); $y++): ?>
                                        <option value="<?= $y ?>"><?= $y ?></option>
                                        <?php endfor; ?>
=======
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">
                                        <i class="bx bx-filter font-size-16 align-middle me-2"></i> Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <!-- Report Table -->
=======
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
<<<<<<< HEAD

                        <?php if (!empty($date) && !empty($year)): ?>
                        <div class="text-center pb-3">
                            <b>INSTA RENT</b><br>
                            <b>LAPORAN LABA RUGI</b><br>
                            <b>Periode <?= $date ?> <?= $year ?></b><br><br>
                            <a href="<?= base_url("laba-rugi/pdf/$month/$year") ?>" class="btn btn-danger btn-sm">
                                <i class="btn btn-danger btn-lg px-4"></i> Download PDF
                            </a>
                            <a href="<?= base_url("laba-rugi/excel/$month/$year") ?>" class="btn btn-success btn-sm">
                                <i class="btn btn-success btn-lg px-4"></i> Download Excel
                            </a>
                        </div>
                        <?php endif; ?>

                        <div class="table-responsive mt-3">
=======
                        <div class="text-center pb-2">
                            <b>INSTA RENT</b><br>
                            <b>LAPORAN LABA RUGI</b><br>
                            <b>Periode <?= $date ?> <?= $year ?></b>
                        </div>

                        <div class="table-responsive">
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
<<<<<<< HEAD
                                        <th class="text-center">Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pendapatan) || !empty($beban)): ?>
=======
                                        <th class='text-center'>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                                    <tr>
                                        <td><b>Pendapatan</b></td>
                                        <td></td>
                                    </tr>
                                    <?php
<<<<<<< HEAD
                                        $total_pendapatan = 0;
                                        foreach ($pendapatan as $pen):
                                            $total_pendapatan += $pen['nominal'];
                                        ?>
                                    <tr>
                                        <td><?= $pen['nama_akun'] ?></td>
                                        <td class="text-center"><?= nominal($pen['nominal']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td><b>Total Pendapatan</b></td>
                                        <td class="text-center"><b><?= nominal($total_pendapatan) ?></b></td>
=======
                                    $total_pendapatan = 0;
                                    if (!empty($pendapatan)):
                                        foreach ($pendapatan as $pen):
                                            $total_pendapatan += $pen['nominal'];
                                    ?>
                                    <tr>
                                        <td><?= $pen['nama_akun'] ?></td>
                                        <td class='text-center'><?= nominal($pen['nominal']) ?></td>
                                    </tr>
                                    <?php endforeach; endif; ?>
                                    <tr>
                                        <td><b>Total Pendapatan</b></td>
                                        <td class='text-center'><b><?= nominal($total_pendapatan) ?></b></td>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                                    </tr>

                                    <tr>
                                        <td><b>Beban</b></td>
                                        <td></td>
                                    </tr>
                                    <?php
<<<<<<< HEAD
                                        $total_beban = 0;
                                        foreach ($beban as $beb):
                                            $total_beban += $beb['nominal'];
                                        ?>
                                    <tr>
                                        <td><?= $beb['nama_akun'] ?></td>
                                        <td class="text-center"><?= nominal($beb['nominal']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td><b>Total Beban</b></td>
                                        <td class="text-center"><b><?= nominal($total_beban) ?></b></td>
=======
                                    $total_beban = 0;
                                    if (!empty($beban)):
                                        foreach ($beban as $beb):
                                            $total_beban += $beb['nominal'];
                                    ?>
                                    <tr>
                                        <td><?= $beb['nama_akun'] ?></td>
                                        <td class='text-center'><?= nominal($beb['nominal']) ?></td>
                                    </tr>
                                    <?php endforeach; endif; ?>
                                    <tr>
                                        <td><b>Total Beban</b></td>
                                        <td class='text-center'><b><?= nominal($total_beban) ?></b></td>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                                    </tr>

                                    <?php $laba_bersih = $total_pendapatan - $total_beban; ?>
                                    <tr>
                                        <td><b><?= $laba_bersih >= 0 ? 'Laba Bersih' : 'Rugi Bersih' ?></b></td>
<<<<<<< HEAD
                                        <td class="text-center"><b><?= nominal($laba_bersih) ?></b></td>
                                    </tr>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="2" class="text-center">Silakan pilih bulan dan tahun untuk
                                            menampilkan data.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

=======
                                        <td class='text-center'><b><?= nominal($laba_bersih) ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD

    </div>
</div>

<?= $this->endSection('content-admin'); ?>
=======
    </div>
</div>
<?=$this->endSection('content-admin'); ?>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
