<?=$this->extend('templates/head');?>
<?=$this->section('content-admin');?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Buku Besar</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Jurnal</a></li>
                            <li class="breadcrumb-item active">Buku Besar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('buku-besar/filter') ?>" method="post">
                            <div class="row">
                                <div class="form-group col-md-3 mb-1">
                                    <select class="form-control" name="month" required>
                                        <option value="" disabled selected>Bulan</option>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?= $i ?>"><?= format_bulan($i) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 mb-1">
                                    <select class="form-control" name="year" required>
                                        <option value="" disabled selected>Tahun</option>
                                        <?php for ($y = date('Y') - 2; $y <= date('Y'); $y++) { ?>
                                        <option value="<?= $y ?>"><?= $y ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 mb-1">
                                    <select class="form-control" name="id_akun" required>
                                        <option value="" disabled selected>Akun</option>
                                        <?php foreach ($list_akun as $list) { ?>
                                        <option value="<?= $list['id_akun'] ?>"><?= $list['nama_akun'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center pb-2">
                            <h5><b>INSTA RENT</b></h5>
                            <h5><b>BUKU BESAR</b></h5>
                            <h6><b>Periode <?= $date ?> <?= $year ?></b></h6>
                            <h6><b><?= $nama_akun ?></b></h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped align-middle dt-responsive nowrap" style="width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th rowspan="2">Tanggal</th>
                                        <th rowspan="2">Nama Akun</th>
                                        <th rowspan="2">REF</th>
                                        <th rowspan="2" class="text-center">Debet</th>
                                        <th rowspan="2" class="text-center">Kredit</th>
                                        <th colspan="2" class="text-center">Saldo</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Debet</th>
                                        <th class="text-center">Kredit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td class="bg-light">Saldo Awal</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <?php 
                                        if ($posisi_saldo_normal === 'd') {
                                            $saldo_debet = $saldo_awal;
                                            $saldo_kredit = 0;
                                            echo "<td class='bg-light text-right'>" . nominal($saldo_awal) . "</td><td>-</td>";
                                        } else {
                                            $saldo_debet = 0;
                                            $saldo_kredit = $saldo_awal;
                                            echo "<td>-</td><td class='bg-light text-right'>" . nominal($saldo_awal) . "</td>";
                                        }
                                        ?>
                                    </tr>
                                    <?php foreach ($buku_besar as $data) { ?>
                                    <tr>
                                        <td><?= $data['tanggal'] ?></td>
                                        <td><?= $data['nama_akun'] ?></td>
                                        <td><?= $data['id_akun'] ?></td>
                                        <?php if ($data['posisi'] === 'd') { ?>
                                        <td class="text-right"> <?= nominal($data['nominal']) ?> </td>
                                        <td>-</td>
                                        <?php $saldo_debet += $data['nominal']; ?>
                                        <?php } else { ?>
                                        <td>-</td>
                                        <td class="text-right"> <?= nominal($data['nominal']) ?> </td>
                                        <?php $saldo_kredit += $data['nominal']; ?>
                                        <?php } ?>
                                        <td class="text-right"> <?= nominal($saldo_debet) ?> </td>
                                        <td class="text-right"> <?= nominal($saldo_kredit) ?> </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>-</td>
                                        <td class="bg-light">Saldo Akhir</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td class="bg-light text-right"> <?= nominal($saldo_debet - $saldo_kredit) ?>
                                        </td>
                                        <td>-</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection();?>