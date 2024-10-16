<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    protected $dashboardModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
    }

    public function index()
    {

        $pemesanan = $this->dashboardModel->getPemesananData();
        $pengeluaran = $this->dashboardModel->getPengeluaranData();
        $waktuData = $this->dashboardModel->getWaktuData();

        $data = [
            'pemesanan' => $pemesanan,
            'pengeluaran' => $pengeluaran,
            'waktu' => $waktuData,
            'title' => 'Dashboard',
            'grafik' => $this->dashboardModel->grafik(),
            'total_pemesanan' => $this->dashboardModel->pemesananPerBulan()->total_pemesanan,
            'total_pengeluaran' => $this->dashboardModel->pengeluaranPerBulan()->total_pengeluaran,
            'data_pemesanan' => $this->dashboardModel->countPemesananPerBulan()->data_pemesanan,
            'data_pengeluaran' => $this->dashboardModel->countPengeluaranPerBulan()->data_pengeluaran,
        ];

        return view('dashboard/index', $data);
    }
}
