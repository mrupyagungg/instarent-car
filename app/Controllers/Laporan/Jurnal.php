<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use App\Models\Laporan\JurnalModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Jurnal extends BaseController
{
    protected $jurnalModel;

    public function __construct()
    {
        $this->jurnalModel = new JurnalModel();
    }

    public function index()
    {
        return view('laporan/view_data_jurnal_umum', [
            'title' => 'Jurnal Umum',
            'jurnal' => [],
            'date' => '',
            'year' => ''
        ]);
    }

    public function show_data_jurnal()
    {
        $month = esc($this->request->getPost('month') ?? date('m'));
        $year = esc($this->request->getPost('year') ?? date('Y'));

        if (!$this->validateMonthYear($month, $year)) {
            return redirect()->back()->with('error', 'Bulan atau tahun tidak valid');
        }

        $bulan = function_exists('format_bulan') ? format_bulan($month) : $month;

        return view('laporan/view_data_jurnal_umum', [
            'title' => 'Jurnal Umum',
            'jurnal' => $this->jurnalModel->getJurnal($month, $year),
            'date' => $bulan,
            'year' => $year
        ]);
    }

    public function downloadPDF()
    {
        $month = esc($this->request->getGet('month') ?? date('m'));
        $year = esc($this->request->getGet('year') ?? date('Y'));

        if (!$this->validateMonthYear($month, $year)) {
            return redirect()->back()->with('error', 'Bulan atau tahun tidak valid');
        }

        $jurnal = $this->jurnalModel->getJurnal($month, $year);
        $bulan = function_exists('format_bulan') ? format_bulan($month) : $month;

        $html = view('laporan/pdf_jurnal_umum', [
            'title' => 'Jurnal Umum',
            'jurnal' => $jurnal,
            'date' => $bulan,
            'year' => $year
        ]);

        $dompdf = new Dompdf(new Options(['defaultFont' => 'Arial']));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Jurnal_Umum_{$bulan}_{$year}.pdf", ["Attachment" => true]);
    }

    private function validateMonthYear($month, $year)
    {
        return is_numeric($month) && $month >= 1 && $month <= 12 &&
               is_numeric($year) && $year >= 2000 && $year <= date('Y');
    }
}