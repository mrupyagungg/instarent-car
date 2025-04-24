<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- Start Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Jurnal Umum</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Jurnal</a></li>
                            <li class="breadcrumb-item active">Jurnal Umum</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Filter Form -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('jurnal/filter') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-5 mb-1">
                                    <select class="form-control" name="month" required>
                                        <option value="" disabled selected>Bulan</option>
                                        <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?= $i ?>" <?= old('month') == $i ? 'selected' : '' ?>>
                                            <?= format_bulan($i) ?>
                                        </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-5 mb-1">
                                    <select class="form-control" name="year" required>
                                        <option value="" disabled selected>Tahun</option>
                                        <?php for ($y = 2022; $y <= date('Y'); $y++): ?>
                                        <option value="<?= $y ?>" <?= old('year') == $y ? 'selected' : '' ?>>
                                            <?= $y ?>
                                        </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">
                                        <i class="bx bx-search font-size-16 align-middle me-2"></i> Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Filter Form -->

        <!-- <a href="<?= base_url('laporan/jurnal/downloadPDF?month=' . urlencode($month ?? '') . '&year=' . urlencode($year ?? '')) ?>"
            class="btn btn-danger">
            <i class="bx bxs-file-pdf"></i> Download PDF
        </a> -->

        <!-- Jurnal Umum Header -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-center">
                        <b>INSTA RENT</b><br>
                        <b>JURNAL UMUM</b><br>
                        <b>Periode <?= esc(format_bulan($month ?? 'N/A')) ?> <?= esc($year ?? 'N/A') ?></b>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Jurnal Umum Header -->

        <!-- Table Jurnal -->
        <div class="table-responsive">
            <table id="jurnal" class="table table-striped align-middle dt-responsive nowrap" style="width: 100%;">
                <thead>
                    <tr class="bg-dark-light">
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th class="text-center">Ref</th>
                        <th class="text-center">Debit</th>
                        <th class="text-center">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($jurnal) && is_array($jurnal)): ?>
                    <?php $totalDebit = 0; $totalKredit = 0; ?>
                    <?php foreach ($jurnal as $data_jurnal): ?>
                    <?php 
                                if ($data_jurnal['posisi'] === 'd') {
                                    $totalDebit += $data_jurnal['nominal'];
                                } else {
                                    $totalKredit += $data_jurnal['nominal'];
                                }
                            ?>
                    <tr>
                        <td width="100"> <?= esc(format_date($data_jurnal['tanggal'])) ?> </td>
                        <td width="250" <?= $data_jurnal['posisi'] === 'k' ? 'style="padding-left: 50px;"' : '' ?>>
                            <?= esc($data_jurnal['transaksi']) ?>
                        </td>
                        <td width="100" class="text-center"> <?= esc($data_jurnal['id_akun']) ?> </td>
                        <td width="100" class="text-end">
                            <?= $data_jurnal['posisi'] === 'd' ? nominal($data_jurnal['nominal']) : '' ?> </td>
                        <td width="100" class="text-end">
                            <?= $data_jurnal['posisi'] === 'k' ? nominal($data_jurnal['nominal']) : '' ?> </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data jurnal</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th class="text-end"> <?= nominal($totalDebit ?? 0) ?> </th>
                        <th class="text-end"> <?= nominal($totalKredit ?? 0) ?> </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- End Table Jurnal -->
    </div>
</div>

<?= $this->endSection(); ?>