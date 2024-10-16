<?php
namespace App\Controllers;

use \App\Models\KendaraanModel;
use \App\Models\Laporan\JurnalModel;
use \App\Models\PelangganModel;
use \App\Models\PemesananModel;

class Pemesanan extends BaseController
{
    protected $validation;
    protected $pemesananModel;
    protected $kendaraanModel;
    protected $jurnalModel;
    protected $pelangganModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->pemesananModel = new PemesananModel();
        $this->kendaraanModel = new KendaraanModel();
        $this->jurnalModel = new JurnalModel();
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Transaksi Penerimaan',
            'pemesanan' => $this->pemesananModel->getAll(),
        ];
        return view('pemesanan/view_data_pemesanan', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Pemesanan',
            'kode_pemesanan' => $this->pemesananModel->getKodePemesanan(),
            'pelanggan' => $this->pelangganModel->findAll(),
            'kendaraan' => $this->kendaraanModel->findAll(),
        ];
        return view('pemesanan/add_data_pemesanan', $data);
    }

    public function create()
    {
        $kode_pemesanan = $this->pemesananModel->getKodePemesanan();
        $data = [
            'title' => 'Tambah Data Pemesanan',
            'kode_pemesanan' => $kode_pemesanan,
            'pelanggan' => $this->pelangganModel->findAll(),
            'kendaraan' => $this->kendaraanModel->findAll(),
        ];

        $this->validation->setRules($this->pemesananModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $harga_sewa = $this->kendaraanModel->where('id_kendaraan', $this->request->getPost('kendaraan_id'))->get()->getFirstRow()->harga_sewa_kendaraan;
            $total_harga = $this->request->getPost('lama_pemesanan') * $harga_sewa;
            $jaminan_identitas = $this->request->getFile('jaminan_identitas');

            if (!is_dir(ROOTPATH . 'uploads/images/')) {
                mkdir(ROOTPATH . 'uploads/images/', 0777, true);
            }

            $fileName = time() . '.' . $jaminan_identitas->getExtension();
            $jaminan_identitas->move('uploads/images/', $fileName);

            $pemesanan = array(
                'kode_pemesanan' => $data['kode_pemesanan'],
                'lama_pemesanan' => $this->request->getPost('lama_pemesanan'),
                'tanggal_pemesanan' => $this->request->getPost('tanggal_pemesanan'),
                'total_harga' => $total_harga,
                'plat_nomor' => $this->request->getPost('plat_nomor'),
                'jaminan_identitas' => $fileName,
                'pelanggan_id' => $this->request->getPost('pelanggan_id'),
                'kendaraan_id' => $this->request->getPost('kendaraan_id'),
            );

            $this->pemesananModel->createPemesanan($pemesanan);

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
            return view('pemesanan/add_data_pemesanan', $data);
        }
    }


public function downloadNota($id)
{
    // buat ngambil data dari row nya aja
    $pemesanan = $this->pemesananModel->getById($id);
    $pelanggan = $this->pelangganModel->find($pemesanan['pelanggan_id']);
    $kendaraan = $this->kendaraanModel->find($pemesanan['kendaraan_id']);

    // buat isi nya
    $content = "
        Nota Pemesanan\n
        Kode Pemesanan: {$pemesanan['kode_pemesanan']}\n
        Nama Pelanggan: {$pelanggan['nama_pelanggan']}\n
        Nama Kendaraan: {$kendaraan['nama_kendaraan']}\n
        Tanggal Pemesanan: {$pemesanan['tanggal_pemesanan']}\n
        Lama Pemesanan: {$pemesanan['lama_pemesanan']} Hari\n
        Total Harga: {$pemesanan['total_harga']}\n
    ";

}


    public function edit($id)
    {
        $pemesanan = $this->pemesananModel->getById($id);
        $data = [
            'title' => 'Edit Data Pemesanan',
            'pemesanan' => $pemesanan,
            'pelanggan' => $this->pelangganModel->findAll(),
            'kendaraan' => $this->kendaraanModel->findAll(),
        ];

        $this->validation->setRules([
            'tanggal_pemesanan' => [
                'label' => 'Tanggal Pemesanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} mohon diisi',
                ],
            ],
            'lama_pemesanan' => [
                'label' => 'Lama Pemesanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} mohon diisi',
                ],
            ],
            'pelanggan_id' => [
                'label' => 'Pelanggan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} mohon diisi',
                ],
            ],
            'kendaraan_id' => [
                'label' => 'Kendaraan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} mohon diisi',
                ],
            ],
            'plat_nomor' => [
                'label' => 'Plat Nomor',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} mohon diisi',
                ],
            ],
            'jaminan_identitas' => [
                'label' => 'Jaminan Identitas',
                'rules' => [
                    'is_image[jaminan_identitas]',
                    'mime_in[jaminan_identitas,image/jpg,image/jpeg,image/png,image/gif]',
                    'max_size[jaminan_identitas,1024]',
                ],
                'errors' => [
                    'is_image' => '{field} harus berupa gambar',
                    'mime_in' => '{field} harus berformat jpg, jpeg, png, gif',
                    'max_size' => '{field} melebihi 1MB',
                ],
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $jurnal_debit = $this->jurnalModel->where('reff', $pemesanan['kode_pemesanan'])->where('id_akun', 101)->get()->getFirstRow()->id;
            $jurnal_kredit = $this->jurnalModel->where('reff', $pemesanan['kode_pemesanan'])->get()->getLastRow()->id;
            $harga_sewa = $this->kendaraanModel->where('id_kendaraan', $this->request->getPost('kendaraan_id'))->get()->getFirstRow()->harga_sewa_kendaraan;
            $total_harga = $this->request->getPost('lama_pemesanan') * $harga_sewa;
            $jaminan_identitas = $this->request->getFile('jaminan_identitas');

            if ($jaminan_identitas->getFilename() == "") {
                $fileName = $pemesanan['jaminan_identitas'];
            } else {
                $fileName = time() . '.' . $jaminan_identitas->getExtension();
                $jaminan_identitas->move('uploads/images/', $fileName);
                unlink('uploads/images/' . $pemesanan['jaminan_identitas']);
            }

            $pemesanan = array(
                'lama_pemesanan' => $this->request->getPost('lama_pemesanan'),
                'tanggal_pemesanan' => $this->request->getPost('tanggal_pemesanan'),
                'total_harga' => $total_harga,
                'plat_nomor' => $this->request->getPost('plat_nomor'),
                'jaminan_identitas' => $fileName,
                'pelanggan_id' => $this->request->getPost('pelanggan_id'),
                'kendaraan_id' => $this->request->getPost('kendaraan_id'),
            );

            $this->pemesananModel->update($id, $pemesanan);

            $jurnal = [
                'nominal' => $total_harga,
            ];

            $this->jurnalModel->updateJurnal($jurnal, $jurnal_debit);
            $this->jurnalModel->updateJurnal($jurnal, $jurnal_kredit);
            session()->setFlashdata('success', 'Data Pemesanan berhasil diubah');
            return redirect()->to('pemesanan');
        } else {
            return view('pemesanan/edit_data_pemesanan', $data);
        }
    }

    public function approve($id)
{    
    $pemesanan = $this->pemesananModel->getById($id);    
    if (!$pemesanan) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
    }    
    $this->pemesananModel->update($id, [
        'persetujuan' => 'approved'
    ]);
    session()->setFlashdata('success', 'Pemesanan telah di setujui');
    return redirect()->to(base_url('pemesanan'));
}

public function disapprove($id)
{   
    $pemesanan = $this->pemesananModel->getById($id);   
    if (!$pemesanan) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
    }
    $this->pemesananModel->update($id, [
        'persetujuan' => 'disapproved' 
    ]);
    session()->setFlashdata('success', 'Pemesanan tidak disetujui');
    return redirect()->to(base_url('pemesanan'));
}


    public function nota($id)
{
    // buat ambil data dari row yang dipilih
    $pemesanan = $this->pemesananModel->getById($id);

    // buat cek ketersediaan data
    if (!$pemesanan) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
    }

    // buat isi nya
    $content = "< NOTA >\n";
    $content .= "\nKode Pemesanan: " . $pemesanan['kode_pemesanan'] . "\n";
    $content .= "Lama Pemesanan: " . $pemesanan['lama_pemesanan'] . "\n";
    $content .= "Tanggal Pemesanan: " . $pemesanan['tanggal_pemesanan'] . "\n";
    $content .= "Total Harga: " . $pemesanan['total_harga'] . "\n";
    $content .= "Plat Nomor: " . $pemesanan['plat_nomor'] . "\n";

    // buat nama file
    $fileName = 'nota_pemesanan_' . $pemesanan['kode_pemesanan'] . '.txt';

    // buat header
    $this->response->setHeader('Content-Type', 'text/plain');
    $this->response->setHeader('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    $this->response->setBody($content);

    return $this->response;
}


}
