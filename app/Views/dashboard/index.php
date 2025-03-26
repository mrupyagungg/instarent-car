<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row pt-5 pb-2">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="row">
            <?php 
      $cards = [
        ["title" => "Total Pemesanan", "value" => nominal($total_pemesanan)],
        ["title" => "Total Pengeluaran", "value" => nominal($total_pengeluaran)],
        ["title" => "Transaksi Pemesanan", "value" => "$data_pemesanan Transaksi"],
        ["title" => "Transaksi Pengeluaran", "value" => "$data_pengeluaran Transaksi"]
      ];
      ?>

            <?php foreach ($cards as $card) : ?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title mb-4"><b><?= $card['title'] ?> (<?= date('F Y') ?>)</b></h4>
                        <h3 class="text-dark"><?= $card['value'] ?></h3>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content-script'); ?>
<!-- JavaScript Chart -->
<script>
var options = {
    series: [{
            name: 'Pemesanan',
            data: <?= json_encode($pemesanan); ?>
        },
        {
            name: 'Pengeluaran',
            data: <?= json_encode($pengeluaran); ?>
        }
    ],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: true,
        formatter: val => "Rp" + val.toLocaleString('id-ID'),
        offsetY: -20,
        style: {
            fontSize: '12px',
            colors: ["#304758"]
        }
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: <?= json_encode($waktu); ?>
    },
    yaxis: {
        title: {
            text: 'Total Pemesanan & Pengeluaran Per Bulan'
        }
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: val => "Rp" + val.toLocaleString('id-ID')
        }
    }
};

new ApexCharts(document.querySelector("#grafik"), options).render();
</script>
<?= $this->endSection(); ?>