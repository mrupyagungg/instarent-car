<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\BukuBesarModel;
use \App\Models\Laporan\LabaRugiModel;

class LabaRugi extends BaseController
{
    protected $labarugiModel;
    protected $bukuBesarModel;

    public function __construct()
    {
        $this->labarugiModel = new LabaRugiModel();
        $this->bukuBesarModel = new BukuBesarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Kas',
            'saldo_awal_kas' => [],
            'pemasukan' => [],
            'pengeluaran' => [],
            'date' => '',
            'year' => '',
        ];

        return view('laporan/view_data_lap_kas', $data);
    }

    public function show_data_laba_rugi()
{
    $month = $this->request->getPost('month');
    $year = $this->request->getPost('year');
    $bulan = format_bulan($month);

    $pendapatan = $this->labarugiModel->getPendapatan($month, $year);
    $beban = $this->labarugiModel->getBeban($month, $year);

    $total_pendapatan = array_sum(array_column($pendapatan, 'nominal'));
    $laba_kotor = $total_pendapatan;
    $laba_bersih = $laba_kotor - array_sum(array_column($beban, 'nominal'));

    $data = [
        'title' => 'Laporan Laba Rugi',
        'pendapatan' => $pendapatan,
        'beban' => $beban,
        'date' => $bulan,
        'year' => $year,
        'total_pendapatan' => $total_pendapatan,
        'laba_kotor' => $laba_kotor,
        'total_beban' => array_sum(array_column($beban, 'nominal')),
        'laba_bersih' => $laba_bersih,
    ];

    return view('laporan/view_data_lap_kas', $data);
}

}
