<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\BukuBesarModel;
use \App\Models\CoaModel;


class BukuBesar extends BaseController
{
    protected $bukuBesarModel;
    protected $coaModel;

    public function __construct()
    {
        $this->bukuBesarModel = new BukuBesarModel();
        $this->coaModel = new CoaModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Buku Besar',
            'buku_besar'            => [],
            'list_akun'             => $this->coaModel->findAll(),
            'posisi_saldo_normal'   => '',
            'saldo_awal'            => 0,
            'date'                  => '',
            'year'                  => '',
            'id_akun'               => '',
            'nama_akun'             => ''
        ];
        return view('laporan/view_data_buku_besar', $data);
    }

    public function show_data_buku_besar()
    {
        $akun                       = $this->request->getPost('id_akun');
        $month                      = $this->request->getPost('month');
        $year                       = $this->request->getPost('year');
        $bulan                      = format_bulan($month);

        $data = [
            'title'                 => 'Buku Besar',
            'buku_besar'            => $this->bukuBesarModel->getBukuBesar($akun, $month, $year),
            'list_akun'             => $this->coaModel->findAll(),
            'posisi_saldo_normal'   => $this->bukuBesarModel->getPosisiSaldoNormal($akun),
            'saldo_awal'            => $this->bukuBesarModel->getSaldoAwalBukuBesar($akun, $month, $year),
            'date'                  => $bulan,
            'year'                  => $year,
            'id_akun'               => $akun,
            'nama_akun'             => $this->coaModel->where('id_akun', $akun)->get()->getFirstRow()->nama_akun
        ];
        // dd($data);
        return view('laporan/view_data_buku_besar', $data);
    }
}
