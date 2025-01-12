<?php
namespace App\Controllers;

use \App\Models\KendaraanModel;
use \App\Models\Laporan\JurnalModel;
use \App\Models\PelangganModel;
use \App\Models\Pemesanan;

class PemesananController extends BaseController
{
    protected $validation;
    protected $pemesanans;
    protected $kendaraanModel;
    protected $jurnalModel;
    protected $pelangganModel;

    public function __construct()
    {
        // Load validation service and models
        $this->validation = \Config\Services::validation();
        $this->pemesanans = new Pemesanan();
        $this->kendaraanModel = new KendaraanModel();
        $this->jurnalModel = new JurnalModel();
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $pemesananModel = new \App\Models\Pemesanan();
        $kendaraanModel = new \App\Models\KendaraanModel();

        $data = [
            'pemesanan' => $pemesananModel->findAll(), // Data pemesanan
            'kendaraan' => $kendaraanModel->findAll(), // Data kendaraan
        ];

        return view('pemesanan/index', $data);
    }
   

    public function create()
    {
        $kode_pemesanan = $this->pemesanans->getKodePemesanan();
        $data = [
            'title' => 'Tambah Data Pemesanan',
            'kode_pemesanan' => $kode_pemesanan,
            'pelanggan' => $this->pelangganModel->findAll(),
            'kendaraan' => $this->kendaraanModel->findAll(),
        ];

        // Validation rules
        $this->validation->setRules($this->pemesanans->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            // Calculate total price and handle file upload
            $harga_sewa = $this->kendaraanModel->where('id_kendaraan', $this->request->getPost('kendaraan_id'))->get()->getFirstRow()->harga_sewa_kendaraan;
            $total_harga = $this->request->getPost('lama_pemesanan') * $harga_sewa;
            $jaminan_identitas = $this->request->getFile('jaminan_identitas');

            // Prepare data for insertion
            $pemesanan = array(
                'kode_pemesanan' => $data['kode_pemesanan'],
                'lama_pemesanan' => $this->request->getPost('lama_pemesanan'),
                'tanggal_pemesanan' => $this->request->getPost('tanggal_pemesanan'),
                'total_harga' => $total_harga,

                'pelanggan_id' => $this->request->getPost('pelanggan_id'),
                'kendaraan_id' => $this->request->getPost('kendaraan_id'),
            );

            $this->pemesanans->createPemesanan($pemesanan);

            // Create journal entries
            $jurnal = [
                [
                    'tanggal' => date('Y-m-d'),
                    'id_akun' => 101,
                    'nominal' => $total_harga,
                    'posisi' => 'd',
                    'reff' => $kode_pemesanan,
                    'transaksi' => 'Kas',
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'id_akun' => 401,
                    'nominal' => $total_harga,
                    'posisi' => 'k',
                    'reff' => $kode_pemesanan,
                    'transaksi' => 'Pendapatan Sewa',
                ],
            ];

            $this->jurnalModel->createOrderJurnal($jurnal);

            session()->setFlashdata('success', 'Data Pemesanan berhasil disimpan');
            return redirect()->to(base_url('pemesanan'));
        } else {
            $data['validation'] = $this->validation;
            return view('pelanggan/add_data_pelanggan', $data);
        }
    }

    public function downloadNota($id)
    {
        $pemesanan = $this->pemesanans->getById($id);
        $pelanggan = $this->pelangganModel->find($pemesanan['pelanggan_id']);
        $kendaraan = $this->kendaraanModel->find($pemesanan['kendaraan_id']);

        $content = "Nota Pemesanan\n\n";
        $content .= "Kode Pemesanan: {$pemesanan['kode_pemesanan']}\n";
        $content .= "Nama Pelanggan: {$pelanggan['nama_pelanggan']}\n";
        $content .= "Nama Kendaraan: {$kendaraan['nama_kendaraan']}\n";
        $content .= "Tanggal Pemesanan: {$pemesanan['tanggal_pemesanan']}\n";
        $content .= "Lama Pemesanan: {$pemesanan['lama_pemesanan']} Hari\n";
        $content .= "Total Harga: {$pemesanan['total_harga']}\n";

        $fileName = 'nota_pemesanan_' . $pemesanan['kode_pemesanan'] . '.txt';

        return $this->response
            ->setHeader('Content-Type', 'text/plain')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $fileName . '"')
            ->setBody($content);
    }

    public function approve($id)
    {
        $pemesanan = $this->pemesanans->getById($id);
        if (!$pemesanan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $this->pemesanans->update($id, ['persetujuan' => 'approved']);
        session()->setFlashdata('success', 'Pemesanan telah disetujui');
        return redirect()->to(base_url('pemesanan'));
    }

    public function disapprove($id)
    {
        $pemesanan = $this->pemesanans->getById($id);
        if (!$pemesanan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $this->pemesanans->update($id, ['persetujuan' => 'disapproved']);
        session()->setFlashdata('success', 'Pemesanan tidak disetujui');
        return redirect()->to(base_url('pemesanan'));
    }

    public function nota($id)
    {
        $pemesanan = $this->pemesanans->getById($id);

        if (!$pemesanan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $content = "< NOTA >\n";
        $content .= "Kode Pemesanan: {$pemesanan['kode_pemesanan']}\n";
        $content .= "Lama Pemesanan: {$pemesanan['lama_pemesanan']}\n";
        $content .= "Tanggal Pemesanan: {$pemesanan['tanggal_pemesanan']}\n";
        $content .= "Total Harga: {$pemesanan['total_harga']}\n";
        // $content .= "Plat Nomor: {$pemesanan['plat_nomor']}\n";

        $fileName = 'nota_pemesanan_' . $pemesanan['kode_pemesanan'] . '.txt';

        return $this->response
            ->setHeader('Content-Type', 'text/plain')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $fileName . '"')
            ->setBody($content);
    }
}