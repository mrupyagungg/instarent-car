<?=$this->extend('templates/head'); ?>
<?=$this->section('content-admin'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Laba Rugi</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Jurnal</a></li>
                            <li class="breadcrumb-item active">Laba Rugi</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="<?= base_url('laba-rugi/filter') ?>" method="post">
                                <div class="row">
                                    <div class="form-group col-md-4 mb-1">
                                        <select class="form-control" name="month">
                                            <option value="" disabled selected>Bulan</option>
                                            <?php for ($i = 1; $i < 13; $i++) { ?>
                                                <option value="<?= $i ?>"><?= format_bulan($i) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 mb-1">
                                        <select class="form-control" name="year">
                                            <option value="" disabled selected>Tahun</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">
                                            <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Filter
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center pb-2">
                            <div class="row">
                                <div class="col-sm-12" style="background-color:white;">
                                    <b>INSTA RENT</b>
                                </div>
                                <div class="col-sm-12" style="background-color:white;">
                                    <b>LAPORAN LABA RUGI</b>
                                </div>
                                <div class="col-sm-12" style="background-color:white;">
                                    <b>Periode <?= $date ?> <?= $year ?></b>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="table-responsive">
                            <table id="jurnal" class="table align-middle dt-responsive nowrap table-striped"
                                   style="border-collapse: collapse;width: 100%;">
                                <thead>
                                    <tr>
                                        <th><b>Pendapatan</b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_pendapatan = 0;
                                    if (!empty($pendapatan)):
                                        foreach ($pendapatan as $pen):
                                            $total_pendapatan += $pen['nominal'];
                                            ?>
                                            <tr>
                                                <td><?= $pen['nama_akun'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td class='text-center'><?= nominal($pen['nominal']) ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>                                    
                                    <?php $laba_kotor = $total_pendapatan ?>
                                    <?php if ($laba_kotor < 0): ?>
                                        <tr>
                                            <td></td>
                                            <td><b>Total Beban</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class='text-center'><?= nominal($laba_kotor) ?></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td></td>
                                            <td><b>Laba Kotor</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class='text-center'><?= nominal($laba_kotor) ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th><b>Beban</b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_beban = 0;
                                    if (!empty($beban)):
                                        foreach ($beban as $beb):
                                            $total_beban += $beb['nominal'];
                                            ?>
                                            <tr>
                                                <td><?= $beb['nama_akun'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td class='text-center'><?= nominal($beb['nominal']) ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach;
                                    endif; ?>
                                    <tr>
                                        <td></td>
                                        <td><b>Total Beban</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class='text-center'><?= nominal($total_beban) ?></td>
                                    </tr>
                                    <?php $laba_bersih = $laba_kotor - $total_beban; ?>
                                    <tr>
                                        <td></td>
                                        <td><b><?= $laba_bersih >= 0 ? 'Laba Bersih' : 'Rugi Bersih' ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class='text-center'><?= nominal($laba_bersih) ?></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<?=$this->endSection('content-admin'); ?>
