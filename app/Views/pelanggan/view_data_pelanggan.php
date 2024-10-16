<?=$this->extend('templates/head');?>
<?=$this->section('content-admin');?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row pt-5 pb-2">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Master Data Pelanggan</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pelanggan</a></li>
                            <li class="breadcrumb-item active">Master Data Pelanggan</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="pl-3 mb-4">
                                <a href="<?=base_url('pelanggan/add')?>" class="btn btn-block btn-primary">Tambah</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pelanggan</th>
                                        <th>Nama</th>
                                        <th>Nomor Telepon</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$no = 1;
foreach ($pelanggan as $data): ?>
                                        <tr>
                                            <td> <?=$no++?> </td>
                                            <td> <?=$data['kode_pelanggan']?> </td>
                                            <td> <?=$data['nama_pelanggan']?> </td>
                                            <td> <?=$data['no_telp_pelanggan']?> </td>
                                            <td> <?=$data['email_pelanggan']?> </td>
                                            <td> <?=$data['alamat_pelanggan']?> </td>
                                            <td> <?=$data['jenis_kelamin_pelanggan']?> </td>
                                            <td class="text-center">
                                                <a href="<?=base_url('pelanggan/edit/' . $data['id_pelanggan'])?>" type="button" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-edit"></i>
                                                </a>                                               
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<script>
        function deleteConfirm(e) {
            var tomboldelete = document.getElementById('btn-delete')
            id = e.getAttribute('data-id');
            kode = e.getAttribute('data-kode');

            var url3 = "<?=base_url('pelanggan/delete/')?>";
            var url4 = url3.concat("/", id);
            tomboldelete.setAttribute("href", url4); //akan meload kontroller delete

            var pesan = "Data dengan Kode <b>"
            var pesan2 = " </b>akan dihapus"
            var res = kode;
            document.getElementById("text").innerHTML = pesan.concat(res, pesan2);

            var myModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
                keyboard: false
            });

            myModal.show();

        }
    </script>

    <div id="deleteModal" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h5>
                        <a type="button" data-dismiss="modal" aria-hidden="true">×</a>
                    </div>
                    <div class="modal-body" id="text"></div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-body">
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
                                <a href="#" class="btn btn-danger" id="btn-delete" type="submit"><i class="mdi mdi-trash-can fa-lg"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

<?=$this->endSection('content-admin');?>