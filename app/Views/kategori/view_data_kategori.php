<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Data Kategori Beban</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Kategori Beban</a></li>
                            <li class="breadcrumb-item active">Data Kategori Beban</li>
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
                                    <a type="button" class="btn btn-soft-secondary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#add"><i class="bx bx-plus me-1"></i> Tambah Kategori Beban</a>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="table-responsive">
                            <table id="coa" class="table align-middle dt-responsive nowrap table-striped" style="border-collapse: collapse;width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>Akun</th>
                                        <th class="text-center"><i class="fa fa-cog fa-spin"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kategori as $data) : ?>
                                        <tr>
                                            <td> <?= $no++ ?> </td>
                                            <td> <?= $data['kode_kategori'] ?> </td>
                                            <td> <?= $data['nama_kategori'] ?> </td>
                                            <td> <?= $data['id_akun'] . ' - ' . $data['nama_akun'] ?> </td>
                                            <td class="text-center">
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id']; ?>" class="btn btn-warning btn-sm text-white"><i class="mdi mdi-pencil"></i></a>
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $data['id']; ?>" class="btn btn-danger btn-sm text-white">
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
                <form action="<?= base_url('kategori/add') ?>" method="POST" class="no-validated">
                    <?= csrf_field(); ?>
                    <div>
                        <div class="mb-3">
                            <label class="form-label">Kode Kategori</label>
                            <input type="text" class="form-control " name="kode_kategori" value="<?= $kode_kategori ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Akun</label>
                            <select class="form-control" name="id_akun" required>
                                <option value="" disabled selected>Pilih Akun</option>
                                <?php foreach ($coa as $list) { ?>
                                    <option value="<?= $list['id_akun'] ?>"><?= $list['nama_akun']   ?></option>
                                <?php } ?>
                            </select>
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

<?php foreach ($kategori as $data) : ?>
    <div id="edit<?php echo $data['id']; ?>" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title text-white" id="myCenterModalLabel">Edit <?= $title ?></h5>
                    <a type="button" data-bs-dismiss="modal" aria-hidden="true">×</a>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('kategori/edit') ?>" method="POST" class="no-validated">
                        <div>
                            <div class="mb-3">
                                <label class="form-label">Kode Kategori</label>
                                <input type="text" class="form-control " name="kode_kategori" value="<?= $data['kode_kategori'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" value="<?= $data['nama_kategori'] ?>" placeholder="Nama Kategori" autocomplete="off" required>
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


<?php foreach ($kategori as $data) : ?>
    <form action="<?= base_url('kategori/delete') ?>" method="post">
        <div id="delete<?php echo $data['id']; ?>" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
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