<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Data Perlengkapan</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Perlengkapan</a></li>
                            <li class="breadcrumb-item active">Data Perlengkapan</li>
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
                            <div class="col-sm">
                                <div class="mb-4">
                                    <a type="button" class="btn btn-soft-secondary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#add"><i class="bx bx-plus me-1"></i> Tambah Perlengkapan</a>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="table-responsive">
                            <table id="coa" class="table align-middle dt-responsive nowrap table-striped" style="border-collapse: collapse;width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Perlengkapan</th>
                                        <th>Nama Perlengkapan</th>
                                        <th class="text-center"><i class="fa fa-cog fa-spin"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($perlengkapan as $data) : ?>
                                        <tr>
                                            <td> <?= $no++ ?> </td>
                                            <td> <?= $data['id_perlengkapan'] ?> </td>
                                            <td> <?= $data['nama_perlengkapan'] ?> </td>
                                            <td class="text-center">
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_perlengkapan']; ?>" class="btn btn-warning btn-sm text-white"><i class="mdi mdi-pencil"></i></a>
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $data['id_perlengkapan']; ?>" class="btn btn-danger btn-sm text-white">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
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

<div id="add" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title text-white" id="myCenterModalLabel">Tambah <?= $title ?></h5>
                <a type="button" data-bs-dismiss="modal" aria-hidden="true">×</a>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('perlengkapan/add') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="mb-3">
                            <label class="form-label">Id Perlengkapan</label>
                            <input type="text" class="form-control " name="id_perlengkapan" value="<?= $id_perlengkapan ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Perlengkapan</label>
                            <input type="text" class="form-control" name="nama_perlengkapan" placeholder="Nama Perlengkapan" autocomplete="off" required>
                        </div>
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <a href="#" class="btn btn-danger" data-bs-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
                                <button type="submit" class="btn btn-secondary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($perlengkapan as $data) : ?>
    <div id="edit<?php echo $data['id_perlengkapan']; ?>" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title text-white" id="myCenterModalLabel">Edit <?= $title ?></h5>
                    <a type="button" data-bs-dismiss="modal" aria-hidden="true">×</a>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('perlengkapan/edit') ?>" method="POST" class="no-validated">
                        <div>
                            <div class="mb-3">
                                <label class="form-label">Id Perlengkapan</label>
                                <input type="text" class="form-control " name="id_perlengkapan" value="<?= $data['id_perlengkapan'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Perlengkapan</label>
                                <input type="text" class="form-control" name="nama_perlengkapan" value="<?= $data['nama_perlengkapan'] ?>" placeholder="Nama Perlengkapan" autocomplete="off" required>
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-right d-none d-sm-block">
                                    <a href="#" class="btn btn-danger" data-bs-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
                                    <button type="submit" class="btn btn-secondary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>


<?php foreach ($perlengkapan as $data) : ?>
    <form action="<?= base_url('perlengkapan/delete') ?>" method="post">
        <div id="delete<?php echo $data['id_perlengkapan']; ?>" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h5 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h5>
                        <a type="button" data-bs-dismiss="modal" aria-hidden="true">×</a>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-body">
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <input type="hidden" name="id_perlengkapan" value="<?= $data['id_perlengkapan'] ?>">
                                <a href="#" class="btn btn-secondary" data-bs-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
                                <button href="#" class="btn btn-danger" type="submit"><i class="mdi mdi-trash-can fa-lg"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
<?php endforeach ?>

<?= $this->endSection('content-admin'); ?>