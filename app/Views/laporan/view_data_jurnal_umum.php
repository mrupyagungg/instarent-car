<?=$this->extend('templates/head');?>
<?=$this->section('content-admin');?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Jurnal Umum</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Jurnal</a></li>
                            <li class="breadcrumb-item active">Jurnal Umum</li>
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
                            <form action="<?=base_url('jurnal/filter')?>" method="post">
                                <div class="row">
                                    <div class="form-group col-md-5 mb-1">
                                        <select class="form-control" name="month" required>
                                            <option value="" disabled selected>Bulan</option>
                                            <?php for ($i = 1; $i < 13; $i++) {?>
                                            <option value="<?=$i?>"><?=format_bulan($i)?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5 mb-1">
                                        <select class="form-control" name="year" required>
                                            <option value="" disabled selected>Tahun</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
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
                                                    <b>INSTA RENT</b>
                                                </div>
                                                <div class="col-sm-12 bg-white">
                                                    <b>JURNAL UMUM</b>
                                                </div>
                                                <div class="col-sm-12 bg-white">
                                                    <b>Periode <?=$date?> <?=$year?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="table-responsive">
                            <table id="jurnal" class="table align-middle dt-responsive nowrap table-striped"
                                style="border-collapse: collapse;width: 100%;">
                                <thead>
                                    <tr class="bg-dark-light">
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Ref</th>
                                        <th class="text-center">Debit</th>
                                        <th class="text-center">Kredit</th>
                                    </tr>
                                </thead>
                                <?php
                                $total = 0;
                                foreach ($jurnal as $data_jurnal):
                                if ($data_jurnal['posisi'] == 'd'):
                                $total += $data_jurnal['nominal'];
                                endif;?>
				                                <tr>
				                                    <td width="100">
				                                        <?=format_date($data_jurnal['tanggal'])?>
				                                    </td>
				                                    <?php if ($data_jurnal['posisi'] == 'd'): ?>
				                                    <td width="250">
				                                        <?=$data_jurnal['transaksi']?>
				                                    </td>
				                                    <?php else: ?>
                                    <td width="250" style="padding-left: 50px;">
                                        <?=$data_jurnal['transaksi']?>
                                    </td>
                                    <?php endif;?>
                                    <td width="100" class="text-center">
                                        <?=$data_jurnal['id_akun']?>
                                    </td>
                                    <?php if ($data_jurnal['posisi'] == 'd'): ?>
                                    <td width="100" style="text-align: right;">
                                        <?=nominal($data_jurnal['nominal'])?>
                                    </td>
                                    <td> </td>
                                    <?php else: ?>
                                    <td> </td>
                                    <td width="100" style="text-align: right;">
                                        <?=nominal($data_jurnal['nominal'])?>
                                    </td>
                                    <?php endif;?>
                                </tr>
                                <?php endforeach;?>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th style="text-align: right;"><?=nominal($total)?></th>
                                        <th style="text-align: right;"><?=nominal($total)?></th>
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