<?=$this->extend('templates/head');?>
<?=$this->section('content-admin');?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=$title?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:
                                    void(0);"><?=$title?></a></li>
                            <li class="breadcrumb-item active"><?=$title?></li>
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
                        <form action="<?=base_url('pelanggan/edit/' . $pelanggan['id_pelanggan'])?>" method="POST" class="no-validated row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kode Pelanggan</label>
                                <input type="text" class="form-control" name="kode_pelanggan" value="<?=$pelanggan['kode_pelanggan'];?>" autocomplete="off" disabled>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pelanggan" value="<?=$pelanggan['nama_pelanggan'];?>" autocomplete="off">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nomor Telepon Pelanggan</label>
                                <input type="text" class="form-control" name="no_telp_pelanggan" value="<?=$pelanggan['no_telp_pelanggan'];?>" autocomplete="off" maxlength="13">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Email Pelanggan</label>
                                <input type="text" class="form-control" name="email_pelanggan" value="<?=$pelanggan['email_pelanggan'];?>" autocomplete="off">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat Pelanggan</label>
                                <textarea type="text" class="form-control" name="alamat_pelanggan" rows="3" autocomplete="off"><?=$pelanggan['alamat_pelanggan'];?></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Jenis Kelamin Pelanggan</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin_pelanggan" id="laki-laki" value="Laki-Laki" <?=$pelanggan['jenis_kelamin_pelanggan'] == 'Laki-Laki' ? 'checked' : ''?> autocomplete="off">
                                    <label for="laki-laki" class="form-check-label">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin_pelanggan" id="perempuan" value="Perempuan" <?=$pelanggan['jenis_kelamin_pelanggan'] == 'Perempuan' ? 'checked' : ''?> autocomplete="off">
                                    <label for="perempuan" class="form-check-label">Perempuan</label>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12 pt-2">
                                <a href="<?=base_url('pelanggan')?>" class="btn btn-warning"> Batal</a>
                                <button type="submit" class="btn btn-primary"> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection('content-admin');?>