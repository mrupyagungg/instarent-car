<?=$this->extend('templates/head');?>
<?=$this->section('content-admin');?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row pt-5 pb-2">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Transaksi Pemesanan</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pemesanan</a></li>
                            <li class="breadcrumb-item active">Transaksi Pemesanan</li>
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
                        <form action="<?=base_url('pemesanan/create')?>" method="POST" enctype="multipart/form-data" class="no-validated row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kode Pemesanan</label>
                                <input type="text" class="form-control" name="kode_pemesanan" value="<?=$kode_pemesanan?>" autocomplete="off" disabled>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Tanggal Pemesanan</label>
                                <input type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan" autocomplete="off">
                                <?php if (isset($validation)): ?>
                                    <span class="badge bg-danger"> <?=$validation->getError('tanggal_pemesanan')?></span>
                                <?php endif;?>
                            </div>
                            <script>                           
                            var today = new Date().toISOString().split('T')[0];                     
                            document.getElementById('tanggal_pemesanan').setAttribute('min', today);
                            </script>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Lama Pemesanan</label>
                                <input type="number" class="form-control" name="lama_pemesanan" autocomplete="off">
                                <?php if (isset($validation)): ?>
                                        <span class="badge bg-danger"> <?=$validation->getError('lama_pemesanan')?></span>
                                <?php endif;?>
                            </div>
                           
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Jaminan Identitas</label>
                                <input type="file" class="form-control" name="jaminan_identitas" autocomplete="off">
                                <?php if (isset($validation)): ?>
                                        <span class="badge bg-danger"> <?=$validation->getError('jaminan_identitas')?></span>
                                <?php endif;?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Pelanggan</label>
                                <select class="form-control" name="pelanggan_id">
                                    <option value="" disabled selected>Pilih Pelanggan</option>
                                    <?php foreach ($pelanggan as $data): ?>
                                        <option value="<?=$data['id_pelanggan']?>"><?=$data['nama_pelanggan']?> - <?=$data['kode_pelanggan']?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php if (isset($validation)): ?>
                                        <span class="badge bg-danger"> <?=$validation->getError('pelanggan_id')?></span>
                                <?php endif;?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Kendaraan</label>
                                <select class="form-control" name="kendaraan_id">
                                    <option value="" disabled selected>Pilih Kendaraan</option>
                                    <?php foreach ($kendaraan as $data): ?>
                                        <option value="<?=$data['id_kendaraan']?>"><?=$data['nama_kendaraan']?> - <?=nominal($data['harga_sewa_kendaraan'])?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php if (isset($validation)): ?>
                                        <span class="badge bg-danger"> <?=$validation->getError('kendaraan_id')?></span>
                                <?php endif;?>
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