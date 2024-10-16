<?=$this->extend('templates/head');?>
<?=$this->section('content-admin');?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Buku Besar</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Jurnal</a></li>
                            <li class="breadcrumb-item active">Buku Besar</li>
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
                            <form action="<?=base_url('buku-besar/filter')?>" method="post">
                                <div class="row">
                                    <div class="form-group col-md-3 mb-1">
                                        <select class="form-control" name="month" required>
                                            <option value="" disabled selected>Bulan</option>
                                            <?php for ($i = 1; $i < 13; $i++) {?>
                                            <option value="<?=$i?>"><?=format_bulan($i)?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-1">
                                        <select class="form-control" name="year" required>
                                            <option value="" disabled selected>Tahun</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mb-1">
                                        <select class="form-control" name="id_akun" required>
                                            <option value="" disabled selected>Akun</option>
                                            <?php foreach ($list_akun as $list) {?>
                                            <option value="<?=$list['id_akun']?>"><?=$list['nama_akun']?></option>
                                            <?php }?>
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
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center pb-2">
                            <div class="row">
                                <div class="col-sm-12 bg-white">
                                    <div class="col-sm-12" style="background-color:white;">
                                        <b>INSTA RENT</b>
                                    </div>
                                    <div class="col-sm-12" style="background-color:white;">
                                        <b>BUKU BESAR</b>
                                    </div>
                                    <div class="col-sm-12" style="background-color:white;">
                                        <b>Periode <?=$date?> <?=$year?></b>
                                    </div>
                                    <div class="col-sm-12" style="background-color:white;">
                                        <b><?=$nama_akun?></b>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="table-responsive">
                                <table id="jurnal" class="table align-middle dt-responsive nowrap table-striped"
                                    style="border-collapse: collapse;width: 100%;">
                                    <thead class="table-light">
                                        <tr class="bg-dark-light">
                                            <th rowspan="2">Tanggal</th>
                                            <th rowspan="2">Nama Akun</th>
                                            <th rowspan="2">REF</th>
                                            <th rowspan="2" class="text-center">Debet</th>
                                            <th rowspan="2" class="text-center">Kredit</th>
                                            <th colspan="2" class="text-center">Saldo </th>
                                        </tr>
                                        <tr class="bg-dark-light">
                                            <th class="text-center">Debet</th>
                                            <th class="text-center">Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>-</td>
                                            <td style="background-color: #eee">Saldo Awal</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <?php if (strcmp($posisi_saldo_normal, 'd') == 0) {
    $saldo_debet = $saldo_awal;
    $saldo_kredit = 0;
    ?>
                                            <td style='background-color: #eee; text-align: right'>
                                                <?=nominal($saldo_awal)?></td>
                                            <td>-</td>
                                            <?php
} else {
    $saldo_debet = 0;
    $saldo_kredit = $saldo_awal;?>
                                            <td>-</td>
                                            <td style='background-color: #eee; text-align: right'>
                                                <?=nominal($saldo_awal)?></td>
                                            <?php
}?>
                                        </tr>
                                        <?php
//echo $saldo_debet."-".$saldo_kredit."<br>";
foreach ($buku_besar as $data):
    echo "<tr>";
    echo "<td>" . $data['tanggal'] . "</td>";
    echo "<td>" . $data['nama_akun'] . "</td>";
    echo "<td>" . $data['id_akun'] . "</td>";

    if (strcmp($data['posisi'], 'd') == 0) {
        echo "<td style='text-align: right'>" . nominal($data['nominal']) . "</td>";
        echo "<td>-</td>";

        if (strcmp($posisi_saldo_normal, 'd') == 0) {
            $saldo_debet = $saldo_debet + $data['nominal'];
            echo "<td style='text-align: right'>" . nominal($saldo_debet) . "</td>";
            echo "<td style='text-align: right'>" . nominal($saldo_kredit) . "</td>";
        } else {
            $saldo_kredit = $saldo_kredit - $data['nominal'];
            echo "<td style='text-align: right'>" . nominal($saldo_debet) . "</td>";
            echo "<td style='text-align: right'>" . nominal($saldo_kredit) . "</td>";
        }
    } else {
        echo "<td>-</td>";
        echo "<td style='text-align: right'>" . nominal($data['nominal']) . "</td>";

        if (strcmp($posisi_saldo_normal, 'd') == 0) {
            $saldo_debet = $saldo_debet - $data['nominal'];
            echo "<td style='text-align: right'>" . nominal($saldo_debet) . "</td>";
            echo "<td style='text-align: right'>" . nominal($saldo_kredit) . "</td>";
        } else {
            $saldo_kredit = $saldo_kredit + $data['nominal'];
            echo "<td style='text-align: right'>" . nominal($saldo_debet) . "</td>";
            echo "<td style='text-align: right'>" . nominal($saldo_kredit) . "</td>";
        }
    }
    echo "</tr>";
endforeach;
if (strcmp($posisi_saldo_normal, 'd') == 0) {
    $saldo_akhir = $saldo_debet - $saldo_kredit;
} else {
    $saldo_akhir = $saldo_kredit - $saldo_debet;
}
?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>-</td>
                                            <td style='background-color: #eee'>Saldo Akhir</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <?php
if (strcmp($posisi_saldo_normal, 'd') == 0) {
    echo "<td style='background-color: #eee;text-align: right'>" . nominal($saldo_akhir) . "</td>";
    echo "<td style='background-color: ' >-</td>";
} else {
    echo "<td style='background-color: #black' >-</td>";
    echo "<td style='background-color: #eee;text-align: right'>" . nominal($saldo_akhir) . "</td>";
}
?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- end table responsive -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?=$this->endSection('content-admin');?>