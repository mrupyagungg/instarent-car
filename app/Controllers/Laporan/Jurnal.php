<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\JurnalModel;


class Jurnal extends BaseController
{
    protected $jurnalModel;

    public function __construct()
    {
        $this->jurnalModel = new JurnalModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Jurnal Umum',
            'jurnal'            => [],
            'date'              => '',
            'year'              => ''
        ];

        return view('laporan/view_data_jurnal_umum', $data);
    }

    public function show_data_jurnal()
    {
        $month                  = $this->request->getPost('month');
        $year                   = $this->request->getPost('year');
        $bulan                  = format_bulan($month);

        $data = [
            'title'             => 'Jurnal Umum',
            'jurnal'            => $this->jurnalModel->getJurnal($month, $year),
            'date'              => $bulan,
            'year'              => $year
        ];

        return view('laporan/view_data_jurnal_umum', $data);
    }
}
