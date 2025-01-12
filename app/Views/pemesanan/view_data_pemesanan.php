<?=$this->extend('templates/head');?>
<?=$this->section('content-admin');?>

<div class="page-content">
    <div class="container-fluid">

    
        <div class="row pt-5 pb-2">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
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
    

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="pl-3 mb-4">
                                <a href="<?= base_url('pemesanan/add') ?>" class="btn btn-block btn-primary">Tambah</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pemesanan</th>
                                        <th>Hari Pemakaian</th>
                                        <th>Lama Pemesanan</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Total Harga</th>
                                        <th>Plat Nomor</th>
                                        <th>Jaminan Identitas</th>
                                        <th>Pelanggan</th>
                                        <th>Kendaraan</th>
                                        <th>Nota</th>
                                        <th>Persetujuan</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($pemesanan) && is_array($pemesanan)): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pemesanan as $data): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($data['kode_pemesanan']) ?></td>
                                            <td><?= date('d F Y', strtotime($data['tanggal_pemesanan'])) ?></td>
                                            <td><?= esc($data['lama_pemesanan']) ?> Hari</td>
                                            <td><?= date('d F Y', strtotime($data['tanggal_pemesanan'] . ' +' . $data['lama_pemesanan'] . ' days')) ?></td>
                                            <td><?= nominal($data['total_harga']) ?></td>
                                            <td>
                                                <img src="/uploads/images/<?= esc($data['jaminan_identitas']) ?>" alt="<?= esc($data['kode_pemesanan']) ?>" width="150px">
                                            </td>
                                            <td><?= esc($data['nama_pelanggan']) ?></td>
                                            <td><?= esc($data['nama_kendaraan']) ?></td>
                                            <td>
                                                <a href="<?= base_url('pemesanan/nota/' . $data['id_pemesanan']) ?>" class="btn btn-primary">Download Nota</a>
                                            </td>
                                            <td>
                                            <?php if ($data['persetujuan'] == 'approved'): ?>
                                                <span class="badge badge-success">Disetujui</span>
                                            <?php elseif ($data['persetujuan'] == 'disapproved'): ?>
                                                <span class="badge badge-danger">Tidak Disetujui</span>                                                
                                            <?php else: ?>
                                                <a href="<?= base_url('pemesanan/approve/' . $data['id_pemesanan']) ?>" class="btn btn-success">Setuju</a>
                                                <a href="<?= base_url('pemesanan/disapprove/' . $data['id_pemesanan']) ?>" class="btn btn-danger">Tidak Setuju</a>
                                            <?php endif; ?>
                                        </td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="12">No data available</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div> 
</div>


<?=$this->endSection('content-admin');?>
