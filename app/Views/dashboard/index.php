<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>
<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row pt-5 pb-2">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
          <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

          <div class="page-title-right">
            <!-- <ol class="breadcrumb m-0">
              <li class="breadcrumb-item active"><a href="javascript:void(0);">Dashboard</a></li>
            </ol> -->
          </div>

        </div>
      </div>
    </div>
    <!-- end page title -->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4 text-center"><b>Total Pemesanan (<?= date('F Y') ?>)</b></h4>
            <div class="text-center">
              <h3 class="text-dark"><?= nominal($total_pemesanan); ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4 text-center"><b>Total Pengeluaran (<?= date('F Y') ?>)</b></h4>
            <div class="text-center">
              <h3 class="text-dark"><?= nominal($total_pengeluaran); ?></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4 text-center"><b>Transaksi Pemesanan (<?= date('F Y') ?>)</b></h4>
            <div class="text-center">
              <h3 class="text-dark"><?= $data_pemesanan; ?> Transaksi</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4 text-center"><b>Transaksi Pengeluaran (<?= date('F Y') ?>)</b></h4>
            <div class="text-center">
              <h3 class="text-dark"><?= $data_pengeluaran; ?> Transaksi</h3>
            </div>
          </div>
        </div>
      </div>
    </div>



    <?= $this->endSection('content-admin'); ?>
    <?= $this->section('content-script'); ?>
    <!-- java script -->
    <script>
      var options = {
        series: [{
            name: 'Pemesanan',
            data: <?php echo json_encode($pemesanan); ?>
          },
          {
            name: 'Pengeluaran',
            data: <?php echo json_encode($pengeluaran); ?>
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
            endingShape: 'rounded',
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          },
        },
        dataLabels: {
          enabled: true,
          formatter: function(val) {
            return "Rp" + val.toLocaleString('id-ID');
          },
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
          categories: <?php echo json_encode($waktu); ?>,
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
            formatter: function(val) {
              return "Rp" + val.toLocaleString('id-ID');
            }
          }
        }
      };


      var chart = new ApexCharts(document.querySelector("#grafik"), options);

      chart.render();
    </script>
    <?= $this->endSection('content-script'); ?>